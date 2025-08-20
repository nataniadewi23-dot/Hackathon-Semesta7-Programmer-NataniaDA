<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Vote;
use App\Mail\VoteConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Votecontroller extends Controller
{
    public function show(Event $event)
    {
        $candidates = $event->candidates;
        return view('votes.show', compact('event', 'candidates'));
    }
    public function store(Request $request, Event $event)
    { 
        Vote::create([
            'user_id' => auth()->id(),
            'candidate_id' => $request->candidate_id,
            'voted_at' => now(),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'selfie' => $imagePath,
        ]);
        Mail::to(auth()->user()->email)->send(new VoteConfirmation());
        return redirect()->route('dashboard')->with('success', 'Vote submitted successfully.');
    }
}
