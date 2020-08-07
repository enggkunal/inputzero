<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{	
	/**
	 * index For User Api
	 * 
	 * @param  Request $request Request
	 * 
	 * @return Request
	 */
    public function index($id, Request $request){

    	if($request->fmt){
    		return response(implode(',', \App\User::find($id)->toArray()), 200)
                  ->header('Content-Type', 'text/plain');
    	}

		return \App\User::find($id);    	
    }

    /**
     * [web Web listing for users
     * 
     * @return mixed
     */
    public function web(){
    	return view('user-listing', [
    		'users' => \App\User::orderBy('id', 'DESC')->get()
    	]);
    }

    /**
     * store Update or save user
     * 
     * @return
     */
    public function store(\App\Http\Requests\UserRequest $request){
    	$req = $request->all();
    	$req['password'] = \Hash::make('123456');
    	(new \App\User)->fill($req)->save();

    	return view('table', [
    		'users' => \App\User::orderby('id', 'DESC')->get()
    	]);
    }

    /**
     * Update User
     * 
     * @return
     */
    public function update($id, \App\Http\Requests\UserUpdateRequest $request){
    	$user = \App\User::find($id);
    	$user->fill($request->all())->save();

    	return view('table', [
    		'users' => \App\User::orderby('id', 'DESC')->get()
    	]);
    }

    public function delete($id){
    	$user = \App\User::where('id', $id)->delete();

    	return view('table', [
    		'users' => \App\User::orderby('id', 'DESC')->get()
    	]);
    }
}
