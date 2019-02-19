<?php

namespace Jijiki\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Illuminate\Mail\Events\MessageSending;
use Jijiki\Emaillog;

class EmailLogServiceProvider extends EventServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        MessageSending::class => [
            Emaillog::class,
        ],
    ];    

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Log::info('firing email log');        
        parent::boot();
    }
}
