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

                        $crawler->filter('span[class^=address]')->each(function ($node) {
                            if ( !empty( $node->text() ) ) {
                                $location = $node->text();
                            } else {
                                $location = "NA";
                            }
                        });

                        $price = $crawler->filterXPath('//*[@id="ViewItemPage"]/div[5]/div[1]/div[1]/div/div/span/span[1]')->text();

                        $src = $crawler->filterXPath('//*[@id="mainHeroImage"]/img')->extract(['src']);
                        if ( count($src) > 0 ){
                            $preview = $src[0];
                        }

                        $ad = new Ad;
                        $ad->id = $id;
                        $ad->feed_id = $feed->id;
                        $ad->title = $title;
                        $ad->description = $description;
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
