<?php

namespace App\Http\Controllers;

use App\Model\Internacao;
use App\Model\LogRecebimento;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;



class HomeController extends Controller
{

    public function index(Request $request)
    {   
        return response()->json(['oi']);
        
    }

   

}
