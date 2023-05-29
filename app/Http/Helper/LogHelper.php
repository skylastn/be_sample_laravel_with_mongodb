<?php

namespace App\Http\Helper;

use Exception;
use Illuminate\Support\Facades\Log;

class LogHelper
{
    public static function sendErrorLog(Exception $ex)
    {
        $error['line']      = $ex->getLine();
        $error['ip']        = LogHelper::getClientIP();
        $error['message']   = $ex->getMessage();
        $error['file']      = $ex->getFile();
        Log::error($error);
    }

    public static function getClientIP()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}
