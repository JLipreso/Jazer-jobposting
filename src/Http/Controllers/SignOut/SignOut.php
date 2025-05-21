<?php

namespace Jazer\Users\Http\Controllers\SignOut;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SignOut extends Controller
{
    public static function signout($token) {
        $source = DB::connection("conn_users")
            ->table("people_auth")
            ->where([
                ["project_refid", config('usersconfig.project_refid')],
                ["people_auth_refid", $token],
                ["active", "1"]
            ])
            ->update([
                "active"            => '0',
                "signout_at"        => date('Y-m-d h:i:s')
            ]);

        if($source) {
            return [
                "success"   => true
            ];
        }
        else {
            return [
                "success"   => false
            ];
        }
    }
}