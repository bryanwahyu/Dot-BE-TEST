<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function error_json(Int $code=500,mixed $data=null,String $message, bool $success=false)
    {
        $json['code']=$code;
        $json['data']=$data;
        $json['message']=$message;
        $json['status']=$success;

        return response()->json($json,$code);


    }
    public function success_json($code=200,mixed $data=null,String $message, bool $success=true,bool $paginate=false,$link=false)
    {
        $json['code']=$code;
        $json['data']=$data;
        $json['message']=$message;
        $json['status']=$success;
        if($paginate){
            $json['data'] = $data->items();
            $json['meta'] = [
                'next_page_url' => $data->nextPageUrl(),
                'prev_page_url' => $data->previousPageUrl(),
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
            ];
        }
        return response()->json(data:$json,status:$code);

    }
}
