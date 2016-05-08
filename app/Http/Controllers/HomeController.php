<?php

namespace Multistarter\Http\Controllers;

use Illuminate\Http\Request;

use Multistarter\Http\Requests;
use Multistarter\Models\Client;

class HomeController extends Controller
{
    public function index()
    {
        $clients = Client::with(['tenants.products'])->get();
        dd($clients->toArray());
    }
}
