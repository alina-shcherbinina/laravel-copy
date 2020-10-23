<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class HomeController extends Controller
{
	
    //
    public function index()
    {

    	$messages = Message::all(); // use with caution


    	return view('home', [
    		'messages' => $messages 
    	]);
    }
}
