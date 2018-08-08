<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admins\UserRequest;

class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->getUsers();
        return view('admin.users.list_user', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\Admins\UserRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // Get data from view
        $data = $request->only(['username','email','address','phone','role','password']);
        // Create User and show list users with meassage
        $check = $this->user->addUser($data);
        if (!empty($check)) {
            return $this->redirectSuccess("users.index", __('admin/user.user_add.user_add_success'));
        }
        return $this->redirectError("users.index", __('admin/user.user_add.user_add_error'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        echo "show".$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->findUser($id);
        return view('admin.users.edit_user', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\Admins\UserRequest $request request
     * @param int                                  $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        // Get data from view
        $data = $request->only(['username', 'email', 'address', 'phone', 'role']);
        if ($request->password) {
            $data['password'] = $request->password;
        }
        // Create User and show list users with meassage
        $check = $this->user->editUser($data, $id);
        if (!empty($check)) {
            return $this->redirectSuccess("users.index", __('admin/user.user_edit.user_edit_success'));
        }
        return $this->redirectError("users.index", __('admin/user.user_edit.user_edit_error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        echo "delete".$id;
    }
}
