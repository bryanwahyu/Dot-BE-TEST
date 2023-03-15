<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Disabilities\Disabilities;
use Illuminate\Http\Request;

class DisabilityController extends Controller
{
    public function index()
    {
        return $this->success_json(code:200,data:Disabilities::all(),message:'Data disability');
    }
}
