<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Http\Requests\Admins\SlideRequest;

class SlideController extends Controller
{

    protected $slide;

    /**
     ** Create contructor.
     *
     * @param object $slide slide of website
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
        $slides = $this->slide->getSlidesPaginate();
        return view('admin.slides.list_slide', ['slides' => $slides]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slides.add_slide');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SlideRequest $request Slide Request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SlideRequest $request)
    {
        $file = $request->file('image');
        foreach ($file as $item) {
            $name = $item->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while (file_exists(Slide::FOLDER_UPLOAD_SLIDE.$image)) {
                $image = str_random(4)."_".$name;
            }
            $item->move(Slide::FOLDER_UPLOAD_SLIDE, $image);
            $imagesData['image'] = $image;
            $check = $this->slide->addSlideImage($imagesData);
        }
        if (!empty($check)) {
            return $this->redirectSuccess("slides.index", __('admin/slide.slide_add.slide_add_success'));
        }
            return $this->redirectError("slides.index", __('admin/slide.slide_add.slide_add_error'));
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
        $check = $this->slide->deleteSlide($id);
        if ($check) {
            return $this->redirectSuccess("slides.index", __('admin/slide.slide_delete.slide_delete_success'));
        }
        return $this->redirectError("slides.index", __('admin/slide.slide_delete.slide_delete_error'));
    }
}
