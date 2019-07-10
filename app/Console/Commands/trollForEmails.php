<?php

namespace App\Console\Commands;

use App\Models\Contact;
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
        $this->sendEmailToContacts();
        $this->sendEmailToBlipCreators();
    }

    public function sendEmailToBlipCreators()
    {
        $needEmail = Blip::ReadyForCreatorContact()->get();


        if(count($needEmail) > 0) {

            $controller = new EmailController();

            foreach($needEmail as $blip) {
                $creator = User::where('id', $blip->user_id)->firstOrFail();

                $blip->creator_contacted = true;
                $blip->save();

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
                    $contact = $blip['contact_' . $x];
                    if(!is_null($contact)) {
                        //get the recipient from the model
                        $contactModel = Contact::where('id', $contact)->firstOrFail();
                        array_push($recipients, $contactModel);
                    }
                }

                $creator = User::where('id', $blip->user_id)->firstOrFail();

                $blip->contacts_contacted = true;
                $blip->save();

                $controller->sendContactsEmail($creator, $recipients, $blip->notes);
            }
        }
    }
}
