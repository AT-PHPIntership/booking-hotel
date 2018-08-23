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
    	$data = $request->only(['username', 'email', 'address', 'phone', 'password']);
    	$data['role'] = User::NORMAL_USER;
    	$this->user->addUser($data);
        return $this->successResponse($data, Response::HTTP_OK);
    }

}
