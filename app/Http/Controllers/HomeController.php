<?php

namespace Multi\Http\Controllers;

use Illuminate\Http\Request;

use Multi\Http\Requests;
use Multi\Models\Client;

class HomeController extends Controller
{
    public function index()
    {
        $clients = Client::with(['tenants.products'])->get();
        return \Response::make($clients->toArray());
    }
}
