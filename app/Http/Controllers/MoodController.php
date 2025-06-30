<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoodController extends Controller
{


    public function index()
{
    
    $moodData = Mood::with('user')->orderBy('entry_date', 'desc')->get();



    $moodData = Mood::with('user')->orderBy('entry_date', 'desc')->get();
    $trashed = Mood::onlyTrashed()->with('user')->orderBy('deleted_at', 'desc')->get();

        return view('mood_table', compact('moodData', 'trashed'));
}



    public function add(Request $request)
    {
        $request->validate([
            'mood' => 'required|in:Happy,Sad,Angry,Excited',
            'note' => 'nullable|string|max:1000',
        ]);

        $user = Auth::user();
        $today = now()->toDateString();

        $existingMood = Mood::where('user_id', $user->id)
                            ->whereDate('entry_date', $today)
                            ->first();

        if ($existingMood) {
            return redirect()->back()->withErrors(['You have already submitted your mood for today.']);
        }

        Mood::create([
            'user_id' => $user->id,
            'mood' => $request->mood,
            'note' => $request->note,
            'entry_date' => $today,
        ]);

        return redirect()->back()->with('success', 'Mood submitted successfully.');
    }


    public function edit(Mood $mood)
{
    
    if (auth()->id() !== $mood->user_id) {
        abort(403);
    }

    return view('mood_update', compact('mood'));
}


    public function update(Request $request, Mood $mood)
    {
        

        $request->validate([
            'mood' => 'required|in:Happy,Sad,Angry,Excited',
            'note' => 'nullable|string|max:1000',
        ]);

        $mood->update([
            'mood' => $request->mood,
            'note' => $request->note,
        ]);

       
        return redirect('/mood_table')->with('success', 'Mood updated.');

    }

    public function destroy(Mood $mood)
    {
        if (Auth::id() !== $mood->user_id) {
            return redirect()->back()->withErrors('Unauthorized');
        }

        $mood->delete();
        return redirect('/mood_table')->with('success', 'Mood deleted.');
    }

    public function restore($id)
    {
        $mood = Mood::onlyTrashed()->findOrFail($id);
        if (Auth::id() !== $mood->user_id) {
            return redirect()->back()->withErrors('Unauthorized');
        }

        $mood->restore();
        return redirect('/mood_table')->with('success', 'Mood Restored.');
    }



    public function forceDelete($id)
    {
        $mood = Mood::onlyTrashed()->findOrFail($id);
        if (Auth::id() !== $mood->user_id) {
            return redirect()->back()->withErrors('Unauthorized');
        }

        $mood->forceDelete();
        return redirect('/mood_table')->with('success', 'Mood Permanently Deleted.');
    }

    

   
}


?>