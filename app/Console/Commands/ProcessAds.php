<?php

namespace Jijiki\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Jijiki\Feed;

class ProcessAds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jijiki:processads';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send ad emails';

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
        foreach ( Feed::all() as $feed ){
            $ads = $feed->ads()->orderBy('price')->whereEmailed(false);
            if ( $ads->count() > 0 ){
                Mail::send('emails.ads', ['ads' => $ads], function ($m) use ($feed) {
                    $m->from('do-not-reply@watson.test', 'Jijiki');
                    $m->to($feed->user->email);
                    $m->subject('Jijiki: ' . $feed->name);  
                }); 

                // check for failures
                if (Mail::failures()) {
                    $this->info("Failed to send ad emails");
                } else {
                    \Log::info('Sent emails for ' . $feed->name . ' with ' . $ads->count() . ' new ads');
                    $ads->update(['emailed' => true]);
                }    
            }
        }
    }
}
