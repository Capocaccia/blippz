<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SendGrid;

class EmailController extends Controller
{
    public function sendCreatorEmail($blipId, $recipient)
    {

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("noreply@blippz.com", "Blippz.com");
        $email->setSubject("This is your Blippz Check In!");
        $email->addTo($recipient->email, "$recipient->firstName" . " " . "$recipient->lastName");
        $email->addContent(
            "text/html", "Hello " . $recipient->firstName . "! I hope you had fun on your outing.  Please click the link below to indicate you are safe.  If you do not click the link within 24 hours, your Blip contacts will be notified. <br/><br/> <a href='www.blippz.com/#/markSafe/$blipId'>Click here to tell Blippz you are safe!</a>"
        );
        $sendgrid = new SendGrid(config('mail.sendgridApiKey.key'));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }

    public function sendContactsEmail($creator, $recipients, $notes)
    {
        $email = new \SendGrid\Mail\Mail();

        foreach($recipients as $recipient) {

            $email->setFrom("noreply@blippz.com", "Blippz.com");
            $email->setSubject("Urgent: Your friend " . $creator->firstName .' ' . $creator->lastName . " needs your attention.");
            $email->addTo($recipient->email, "$recipient->firstName" . " " . "$recipient->lastName");
            $email->addContent("text/plain", "Hello. " . $creator->firstName .' ' . $creator->lastName . " has not indicated a safe return from their outing.  They requested we contact you with the notes below in case they may be in trouble.  Please try and make contact with " . $creator->firstName .' ' . $creator->lastName . " as soon as possible. \n \n Notes provided by ". $creator->firstName .' ' . $creator->lastName . ": " . $notes);


            $sendgrid = new SendGrid(config('mail.sendgridApiKey.key'));
            try {
                $response = $sendgrid->send($email);
                print $response->statusCode() . "\n";
                print_r($response->headers());
                print $response->body() . "\n";
            } catch (Exception $e) {
                echo 'Caught exception: '. $e->getMessage() ."\n";
            }

        }
    }
}
