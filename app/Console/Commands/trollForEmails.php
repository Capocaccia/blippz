<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\EmailController;

class TrollForEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:troll';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Trolls for emails to be sent to Blip contacts.';

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
        $controller = new EmailController();

        $controller->sendEmail();
    }
}
