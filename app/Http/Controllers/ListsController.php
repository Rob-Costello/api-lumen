<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;

class ListsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        //
    }

    public function test(){

        $user = Auth::user();

        $user = $request->user();

        die(var_dump($user));
       return response()->json(['name' => 'hello', 'state' => 'world']);

    }

    //
}