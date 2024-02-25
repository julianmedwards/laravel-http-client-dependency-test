<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

/**
 * Test controller to show if Http facade usage errors without guzzle dependency.
 */
class testController
{
    public function index()
    {
        error_log("Test request controller index called.");
        $response = Http::get("http://jsonplaceholder.typicode.com/posts/1");

        if ($response->successful()) {
            return response('', 200);
        } else {
            return response('', 500);
        }
    }
}