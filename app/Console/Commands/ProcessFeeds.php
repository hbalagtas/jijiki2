<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        //
    }
}
