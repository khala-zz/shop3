<?php

  

namespace App\Http\Controllers;

   

use Illuminate\Http\Request;

use Exception;

  

class NexmoSMSController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function index()

    {

        try {

  

            $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));

            $client = new \Nexmo\Client($basic);

  

            //$receiverNumber = "+84 93 392 40 19";

            $receiverNumber = "+84 90 607 70 97";

            $message = "This is testing from ItSolutionStuff.com";

  

            $message = $client->message()->send([

                'to' => $receiverNumber,

                'from' => 'Vonage APIs',

                'text' => $message

            ]);

  

            dd('SMS Sent Successfully.');

              

        } catch (Exception $e) {

            dd("Error: ". $e->getMessage());

        }

    }

}