<?php

namespace App\Http\Controllers\activity\participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        return view('activity.participant.index');
    }

    public function create($reqform_id)
    {
        return view('activity.participant.create', ['reqform_id' => $reqform_id]);
    }
}
