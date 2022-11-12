<?php

namespace App\Http\Controllers\activity\activity_image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityImageController extends Controller
{
    public function index()
    {
        return view('activity.activity_image.index');
    }

    public function create()
    {
        return view('activity.activity_image.create');
    }

    public function images()
    {
        return view('activity.activity_image.images_add');
    }
}
