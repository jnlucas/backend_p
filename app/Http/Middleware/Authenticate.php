<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Firebase\Auth\Token\Exception\InvalidToken;
use Kreait\Firebase\Exception\Auth\RevokedIdToken;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Illuminate\Support\Facades\Response;
use Closure;

class Authenticate extends Middleware
{
    protected $auth, $database;

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {       
        try{
            $factory = (new Factory)
            ->withServiceAccount('/var/www/html/integracao-duo-firebase-adminsdk.json')
            ->withDatabaseUri('https://integracao-duo-default-rtdb.firebaseio.com/');

            $this->auth = $factory->createAuth();
            $this->database = $factory->createDatabase();
            $data = $request->all();
            $idToken = $data['token'];
            $this->auth->verifyIdToken($idToken, $checkIfRevoked = true);
            return $next($request);
        
        }catch(\Exception $e){
            return abort(401);
        }
            
            

    }


}
