<?php

use Illuminate\Database\Seeder;
use Jijiki\Feed;

class FeedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Feed::truncate();

        $data = [
        		'user_id' => 1,
        		'name' => 'Road bikes Kitchener',
        		'feed' => 'https://www.kijiji.ca/rss-srp-road-bike/kitchener-area/c648l1700209',
        		'blocklist' => '[spam|spam]',        		
        	];

     	Feed::create($data);
    }
}
