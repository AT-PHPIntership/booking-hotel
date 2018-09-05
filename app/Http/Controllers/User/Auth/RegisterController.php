<?php
namespace App\Http\Controllers\User\Auth;

use App\Http\Requests\Users\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Http\Controllers\User\ApiController;
use App\Models\User;

class RegisterController extends ApiController
{

    protected $user;

    /**
     ** Create contructor.
     *
     * @param App\Models\User $user user
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Login as user
     *
     * @param RegisterRequest $request request
     *
     * @return json authentication code
     */
    public function register(RegisterRequest $request)
    {
        // Get data from API then create User
        $response = $request->only(['username', 'email', 'address', 'phone', 'password']);
        $response['role'] = User::NORMAL_USER;
        $check = $this->user->addUser($response);
        // Check create success and login by user register
        if (!empty($check)) {
            Auth::attempt(['email' => $response['email'], 'password' => $response['password']]);
            $user = Auth::user();
            $data['username'] = $user->username;
            $data['phone'] = $user->phone;
            $data['email'] = $user->email;
            $data['token'] = $user->createToken('token')->accessToken;
            return $this->successResponse($data, Response::HTTP_OK);
        }
        return $this->errorResponse(null, Response::HTTP_UNAUTHORIZED);
    }
}
