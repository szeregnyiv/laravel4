<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;

class RegistrationController extends Controller
{
    public function create(){
    	return  csrf_field();
    }
    public function store(){
    	//Validate the form
    	$this->Validate(request(),[
    			'email'=>'required|email',
    			'password'=>'required|confirmed',
                'group_name'=>'required'
    		]);

    	//Create and save the user.
    	$user = User::create(request(['email','password','group_id']));
        $id = $user->id;
        $user->save();
        Group::create([
            'group_name' =>request('group_name'),
            'user_id'=>  $user->id,


            ]);
    	//Sign them in.
    	auth()->login($user);

    	//Redirect to the home page
    	return $user->id;
    }
}
