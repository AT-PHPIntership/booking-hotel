<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\User\ApiController;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;

class CommentController extends ApiController
{
    protected $comment;
    protected $user;

    /**
     ** Create contructor.
     *
     * @param App\Models\Comment $comment comment
     * @param App\Models\User    $user    user
     *
     * @return void
     */
    public function __construct(Comment $comment, User $user)
    {
        $this->comment = $comment;
        $this->user = $user;
    }

    /**
     * Create new comment
     *
     * @param Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Get data from view
        $data = $request->only(['content', 'username', 'hotel_id', 'rating_point']);
        $id = $this->user->findUserFromName($data['username'])->id;
        $data['user_id'] = $id;
        $check = $this->comment->addComment($data);
        if (!empty($check)) {
            return $this->successResponse($data, Response::HTTP_OK);
        }
        return $this->errorResponse(null, Response::HTTP_UNAUTHORIZED);
    }
}
