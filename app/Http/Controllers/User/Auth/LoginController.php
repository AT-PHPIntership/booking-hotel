<?php
namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Http\Controllers\User\ApiController;
use App\Models\User;
use App\Http\Requests\Users\EditUserRequest;

class LoginController extends ApiController
{
    protected $user;

    /**
     ** Create contructor.
     *
     * @param User $user user
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
            $data['phone'] = $user->phone;
            $data['email'] = $user->email;
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

    /**
     * Change user Information
     *
     * @param Request $request request
     *
     * @return void
     */
    public function changeUserInfor(Request $request)
    {
        $idUser = $this->user->findUserFromName($request['username'])->id;
        $data = $this->user->findUser($idUser);
        if ($data) {
            return $this->successResponse($data, Response::HTTP_OK);
        }
        return $this->errorResponse(__('user/layout.app.logout_unauthorised'), Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Change user Information
     *
     * @param EditUserRequest $request request
     *
     * @return void
     */
    public function editUserInfor(EditUserRequest $request)
    {
        $response = $request->only(['username', 'email', 'address', 'phone']);
        if ($request->password) {
            $response['password'] = $request->password;
        }
        $idUser = $this->user->findUserFromName($request['username_old'])->id;
        $response['role'] = User::NORMAL_USER;
        $check = $this->user->editUser($response, $idUser);
        // Check create success and login by user register
        if (!empty($check)) {
            $request->user()->token()->revoke();
            return $this->successResponse($response, Response::HTTP_OK);
        }
        return $this->errorResponse(null, Response::HTTP_UNAUTHORIZED);
    }
}
