<?php

namespace Jijiki\Console\Commands;

use Illuminate\Console\Command;
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

            $parser = new HtmlDomParser;
        }
    }
}
