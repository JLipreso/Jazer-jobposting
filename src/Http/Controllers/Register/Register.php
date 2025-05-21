<?php

namespace Jazer\Users\Http\Controllers\Register;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Register extends Controller
{
    public static function basic(Request $request) {

        if(Register::isEmailExist($request['people_group_refid'], $request['email'])) {
            return [
                "success"   => true,
                "message"   => "Email already in use"
            ];
        }

        $created = DB::connection("conn_users")
        ->table("people")
        ->insert([
            "project_refid"         => config('usersconfig.project_refid'),
            "people_group_refid"    => $request['people_group_refid'],
            "people_refid"          => \Jazer\Users\Http\Controllers\Utility\ReferenceID::create('USR'),
            "firstname"             => $request['firstname'],
            "lastname"              => $request['lastname'],
            "email"                 => $request['email'],
            "password"              => $request['password'],
            "created_at"            => date('Y-m-d h:i:s'),
            "created_by"            => $request['created_by'],
            'blocked'               => '0',
            "active"                => '1'
        ]);

        if($created) {
            return [
                "success"   => true,
                "message"   => "Account created successfully"
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Fail to create account"
            ];
        }
    }

    public static function isEmailExist($people_group_refid, $email) {
        $counts = DB::connection("conn_users")
        ->table("people")
        ->where([
            "project_refid"         => config('usersconfig.project_refid'),
            "people_group_refid"    => $people_group_refid,
            "email"                 => $email
        ])
        ->count();

        if($counts > 0) {
            return true;
        }
        else {
            return false;
        }
    }
}