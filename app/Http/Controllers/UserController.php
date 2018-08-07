<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        //
        echo "Create";
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        echo "store".$request;
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
        //
        echo "edit".$id;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        echo $request . $id;
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
        if (Auth::user()->id != $id) {
            $check = $this->user->deleteUser($id);
            if ($check) {
                return $this->redirectSuccess("users.index", __('admin/user.user_delete.user_delete_success'));
            }
            return $this->redirectError("users.index", __('admin/user.user_delete.user_delete_error'));
        }
        return $this->redirectError("users.index", __('admin/user.user_delete.user_delete_error'));
    }
}
