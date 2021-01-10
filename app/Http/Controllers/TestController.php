<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dbtest()
    {
        $users = DB::select('select * from User');
        foreach ($users as $user) {
            echo $user->username;
        }

        //return view('user.index', ['users' => $users]);
    }
}