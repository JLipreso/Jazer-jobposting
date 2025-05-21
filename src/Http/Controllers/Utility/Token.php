<?php


namespace Jazer\Users\Http\Controllers\Utility;

use App\Http\Controllers\Controller;

/**
 * \Jazer\Users\Http\Controllers\Utility\Token::create('AUT');
 */

class Token extends Controller
{
    public static function create() {
        return substr(str_shuffle("1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 64);
    }
}