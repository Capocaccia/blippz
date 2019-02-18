<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\EmailController;
use App\Models\Blip;
use App\User;

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
    protected $description = 'Trolls for emails to be sent to Blip creators or contacts.';

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
        $this->sendEmailToBlipCreators();
        $this->sendEmailToContacts();
    }

    public function sendEmailToBlipCreators()
    {
        $needEmail = Blip::ReadyForCreatorContact()->get();

        if(count($needEmail) > 0) {

            $controller = new EmailController();

            foreach($needEmail as $blip) {
                $creator = User::where('id', $blip->user_id);
                $controller->sendCreatorEmail($blip->id, $creator);
            }
        }

    }

    public function sendEmailToContacts()
    {
        $needEmail = Blip::ReadyForContactsEmail()->get();

        if(count($needEmail) > 0) {
            $controller = new EmailController();

            foreach($needEmail as $blip) {

                $recipients = array();

                for ($x = 1; $x <= 3; $x++) {
                    $contact = $needEmail['contact_' . $x];
                    is_null($contact) ? '' : array_push($listOfContacts, $contact);
                }

                $creator = User::where('id', $blip->user_id);

                $controller->sendCreatorEmail($creator, $recipients, $blip->notes);
            }
        }
    }
}
