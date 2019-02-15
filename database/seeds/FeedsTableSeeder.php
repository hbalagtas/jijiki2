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
        		'blocklist' => '[scrap|removal|membership|bmx|vintage|uber|scentsy|solar|boxes|computer repair|firewood|free ride|taxi|dish network|laptop repair|skids|outrageous|kickboxing|directv|inl3d|satellite|cancel|mattress|junk|ebike|delivery|trade|anxiety|channels|piano|oil|similac|epicure|tutor|compost|gift card|quran|couch|magazine|dresser|sedan|queen|unlimited|hutch|cement|referral|carrytel]',        		
        	];

     	Feed::create($data);
    }
}
