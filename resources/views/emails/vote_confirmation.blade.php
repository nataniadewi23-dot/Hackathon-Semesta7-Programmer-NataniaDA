<!-- public function store(Request $request, Event $event)
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
} -->