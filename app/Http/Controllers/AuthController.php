<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Firebase\Auth\Token\Exception\InvalidToken;
use Kreait\Firebase\Exception\Auth\RevokedIdToken;

class AuthController extends Controller
{
    protected $auth, $database;

    public function __construct()
    {   
        $factory = (new Factory)
        ->withServiceAccount('/var/www/html/integracao-duo-firebase-adminsdk.json')
        ->withDatabaseUri('https://integracao-duo-default-rtdb.firebaseio.com/');

      
        $this->auth = $factory->createAuth();
        $this->database = $factory->createDatabase();
    }

    
    public function login(Request $request)
    {
        $dados = $request->all();
        $email = $dados['email'];
        $pass = $dados['password'];

        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($email, $pass);
            return response()->json(['status' => true,'token' => $signInResult->idToken()]);
        } catch (\Throwable $e) {
            return response()->json(['status' => false,'message' => $e->getMessage()]);
        }
    }

    

    public function userCheck(Request $request)
    {
        
        $data = $request->all();

        $idToken = $data['token'];
        try {
            $verifiedIdToken = $this->auth->verifyIdToken($idToken, $checkIfRevoked = true);
            
            return response()->json($verifiedIdToken);
        } catch (\Throwable $e) {
            return response()->json(['status' => false,'message' => $e->getMessage()]);
        }
    }

    

    
    
    
    
}
