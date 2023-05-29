<?php
namespace App\Http\Helper;

class CustomPagination
{
    public static function formatPagination($result)
    {
        $response = [
            'status'        => true,
            'code'          => 200,
            'message'       => "Success",
            'total'         => $result->total(),
            'perPage'       => $result->perPage(),
            'currentPage'   => $result->currentPage(),
            'data'          => $result->getCollection(),
        ];

        return $response;
    }
}
