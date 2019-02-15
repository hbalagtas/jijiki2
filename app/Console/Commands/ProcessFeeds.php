<?php

namespace Jijiki\Console\Commands;

use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Jijiki\Ad;
use Jijiki\Feed;
use \Feeds;
use \HtmlDomParser;

class ProcessFeeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jijiki:processfeeds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process feeds in the database and populates ad table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach( Feed::all() as $feed ){
            $this->info($feed->name);
            $feed_data = Feeds::make($feed->feed);
            $items = $feed_data->get_items();

            $client = new Client();
            
            foreach ($items as $item){
                $tokens = explode('/', $item->get_link());
                $id = end($tokens);
                if (!Ad::find($id)){
                    $price = '';        
                    $title = $item->get_title();
                    if (preg_match($feed->blocklist, strtolower($title)) == 0){                        
                        $description = "<p>".$item->get_description() . "</p>";
                        $link = $item->get_link();
                        $crawler = $client->request('GET', $link);

                        $address_xpath = 'span[class^=address]';
                        if ( $crawler->filter($address_xpath)->count() > 0 ){
                            $location = $crawler->filter($address_xpath)->text();
                        } else {
                            $location = "NA";
                        }

                        $price_xpath = '//*[@id="ViewItemPage"]/div[5]/div[1]/div[1]/div/div/span';
                        
                        if ( $crawler->filterXPath($price_xpath)->count() > 0){
                            $price = $crawler->filterXPath($price_xpath)->text();    
                        } else {
                            $price = "Free/NA";    
                        }

                        $src = $crawler->filterXPath('//*[@id="mainHeroImage"]/img')->extract(['src']);
                        if ( count($src) > 0 ){
                            $preview = $src[0];
                        } else {
                            $preview = "NA";
                        }

                        $ad = new Ad;
                        $ad->id = $id;
                        $ad->feed_id = $feed->id;
                        $ad->title = $title;
                        $ad->description = $description;
                        $ad->location = $location;
                        $ad->price = str_replace(["$", ","], "", $price);
                        $ad->preview = $preview;
                        $ad->link = $link;
                        $ad->save();

                        Log::info("New Ad found: " . $title . " / " . $price);
                    }                    
                }
            }
        }
    }
}
