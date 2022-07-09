<?php
   
namespace App\Http\Controllers\Auth;
   
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;

class AuthController extends BaseController
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($data)){ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised'],401);
        } 
        
        $user = auth()->user();
        $success['token'] =  $user->createToken('MyApp')->accessToken; 
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User login successfully!');
    }

    public function logout(Request $request)
    {
        $access_token = auth()->user()->token();
        $tokenRepository = app(TokenRepository::class);
        $tokenRepository->revokeAccessToken($access_token->id);

        return $this->sendResponse(null, 'User logout successfully!');
    }

}