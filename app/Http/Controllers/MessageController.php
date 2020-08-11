<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\MessageReceivedMail;
use App\Http\Requests\StoreMessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $messages = Message::with('subject');

        if ($request->input('order', 'desc') === 'asc') {
            $messages->orderBy('date');
        } else {
            $messages->orderByDesc('date');
        }

        return view('messages.index', [
            'messages' => $messages->paginate(10),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        $message = Message::create($request->validated());

        // Mail::to('info@agrosty.test')->send(new MessageReceivedMail($message));

        return $message;
    }

    public function report()
    {
        $total = Message::count();

        $groups = Message::get()
            ->groupBy('subject.desc');

        return view('messages.report', [
            'groups' => $groups,
            'total' => $total,
        ]);
    }
}
