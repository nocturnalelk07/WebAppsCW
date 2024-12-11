<?php

namespace App;

use Illuminate\Support\Facades\Http;

class ApiHandler
{
    


    public function __construct() {
        
    }

    //this will return a string containing a joke
    public function getJoke() : String {
        //this is the url for getting a request from the api
        $baseUrl = "https://icanhazdadjoke.com/";
        
        //here we send off the request and get a response back
        $response = Http::accept('application/json')->get($baseUrl);
        
        $dadJoke = "";
        if($response->ok()) {
            //get the contents if status ok
            $responseBody = $response->json();
            $dadJoke = $responseBody["joke"];

        } else {
            //handle error
        }

        return $dadJoke;
    }
}