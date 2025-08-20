<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index(Event $event)
    {
        $candidates = $event->candidates;
        return view('candidates.index', compact('event', 'candidates'));
    }
    public function create(Event $event)
    {
        return view('candidates.create', compact('event'));
    }
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('photo')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
        }
        $event->candidates()->create($input);
        return redirect()->route('candidates.index', $event)->with('success', 'Candidate created successfully.');
    }
    public function edit(Event $event, Candidate $candidate)
    {
        return view('candidates.edit', compact('event', 'candidate'));
    }
    public function update(Request $request, Event $event, Candidate $candidate)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('photo')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
        } else {
            unset($input['photo']);
        }
        $candidate->update($input);
        return redirect()->route('candidates.index', $event)->with('success', 'Candidate updated successfully.');
    }
    public function destroy(Event $event, Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('candidates.index', $event)->with('success', 'Candidates deleted successfully.');   
    }
}
