<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class ClientController extends Controller
{
    public function index(){

    	$user_id = Session::get('login_id');

        $user_data = DB::table('users')->where('id', $user_id)->get()->first();
    	return view('client.client_dashboard', compact('user_data'));
    }
}
