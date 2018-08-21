<?php
namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use DB;
use Carbon\Carbon;
use App\Http\Controllers\User\ApiController;

class LoginController extends ApiController
{
    /**
     * Login as user
     *
     * @return json authentication code
     */
    public function login(Request $request)
    {
        dd($request->all());
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $data['remenber_token'] =  $user->createToken('remenber_token')->accessToken;
            return $this->successResponse($data, Response::HTTP_OK);
        }
        return $this->errorResponse(config('define.login.unauthorised'), Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Logout user
     *
     * @return void
     */
    public function logout()
    {
        $user = Auth::user();
        $accessToken = $user->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);
        $accessToken->revoke();
        $user->last_login_at = Carbon::now();
        $user->save();
        return $this->successResponse(null, Response::HTTP_NO_CONTENT);
    }
}
