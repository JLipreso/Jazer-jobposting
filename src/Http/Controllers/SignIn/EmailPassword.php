<?php

namespace Jazer\Users\Http\Controllers\SignIn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmailPassword extends Controller
{
    public static function signin(Request $request) {
        $source = DB::connection("conn_users")
            ->table("people")
            ->select("project_refid", "people_group_refid", "people_refid", "firstname", "lastname", "email", "blocked", "active")
            ->where([
                "project_refid"     => config('usersconfig.project_refid'),
                "people_group_refid"=> $request['people_group_refid'],
                "email"             => $request['email'],
                "password"          => $request['password']
            ])
            ->get();

        if(count($source) > 0) {

            $token = \Jazer\Users\Http\Controllers\Utility\Token::create('AUT');
            $auth  = DB::connection("conn_users")->table("people_auth")->insert([
                "people_auth_refid"     => $token,
                "project_refid"         => env('project_refid'),
                "people_refid"          => $source[0]->people_refid,
                "signin_at"             => date('Y-m-d h:i:s'),
                "active"                => '1',
                "blocked"               => '0'
            ]);

            return [
                "success"   => true,
                "message"   => "Authenticated",
                "token"     => $token,
                "profile"   => $source[0]
            ];  
        }
        else {
            return [
                "success"   => false,
                "message"   => "Fail to authenticate",
                "profile"   => []
            ]; 
        }
    }
}