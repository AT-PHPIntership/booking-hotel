<?php
namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Http\Controllers\User\ApiController;
use App\Models\User;

class LoginController extends ApiController
{
    /**
     * Login as user
     *
     * @param Request $request request
     *
     * @return json authentication code
     */
    public function login(Request $request)
    {
        $login = Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')]);
        if ($login) {
            $user = Auth::user();
            $data['username'] = $user->username;
            $data['token'] = $user->createToken('token')->accessToken;
            return $this->successResponse($data, Response::HTTP_OK);
        }
        return $this->errorResponse(config('define.login.unauthorised'), Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Logout user
     *
     * @param Request $request request
     *
     * @return void
     */
    public function logout(Request $request)
    {
        $check = $request->user()->token()->revoke();
        if ($check) {
            return $this->successResponse(null, Response::HTTP_NO_CONTENT);
        }
        return $this->errorResponse(__('user/layout.app.logout_unauthorised'), Response::HTTP_UNAUTHORIZED);
    }
}
