<?php
namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterUserRequest;
use App\Models\User;
use PHPUnit\Framework\MockObject\Stub\Exception;
use App\Traits\ApiResponser;

class RegisterController extends Controller
{
    /**
     * Register user function
     *
     * @param RegisterUserRequest $request request
     *
     * @return void
     */
    public function register(RegisterUserRequest $request)
    {
        $user = $request->all();
        $user['password'] = bcrypt($user['password']);
        try {
            $user = User::create($user);
            $data['user'] = User::find($user->id);
            $data['token'] = $user->createToken('token')->accessToken;
            return $this->successResponse($data, Response::HTTP_OK);
        } catch (Exception $ex) {
            return $this->errorResponse(config('define.register.fail'), Response::HTTP_UNAUTHORIZED);
        }
    }
}
