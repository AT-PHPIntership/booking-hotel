<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Http\Controllers\User\ApiController;
use Symfony\Component\HttpFoundation\Response;

class SlideController extends ApiController
{
    protected $slide;

    /**
     ** Create contructor.
     *
     * @param App\Models\Slide $slide slide
     *
     * @return void
     */
    public function __construct(Slide $slide)
    {
        $this->slide = $slide;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = $this->slide->getFrontEndSlides();
        if ($slides) {
            return $this->showAll($slides, Response::HTTP_OK);
        }
        return $this->errorResponse(__('user/home.slide_unauthorised'), Response::HTTP_UNAUTHORIZED);
    }
}
