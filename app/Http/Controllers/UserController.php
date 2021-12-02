<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $name = "Jennifer";
        $users = array(
            "name" => "smith John",
            "email" => "smjohn@gmail.com",
            "phone" => "14646466"
        );
        return view('user',compact('name','users'));
    }
}
