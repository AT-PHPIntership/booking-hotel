<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Redirect by path and send message is success
     *
     * @param string $routeName routeName
     * @param string $message   message
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectSuccess($routeName, $message)
    {
        return redirect()->route($routeName)->with(['status'=> 'success', 'message' => $message]);
    }

    /**
     * Redirect by path and send message is error
     *
     * @param string $routeName routeName
     * @param string $message   message
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectError($routeName, $message)
    {
        return redirect()->route($routeName)->with(['status'=> 'error', 'message' => $message]);
    }

    /**
     * Redirect by path and send message is warning
     *
     * @param string $routeName routeName
     * @param string $message   message
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectWarning($routeName, $message)
    {
        return redirect()->route($routeName)->with(['status'=> 'warning', 'message' => $message]);
    }
}
