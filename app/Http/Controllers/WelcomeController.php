<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Message;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $subjects = Subject::orderBy('desc')->pluck('desc', 'id');

        return view('welcome', [
            'message' => new Message,
            'subjects' => $subjects,
        ]);
    }
}
