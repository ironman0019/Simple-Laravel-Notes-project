<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()->where('user_id', request()->user()->id)->orderBy('created_at', 'desc')->paginate();
        return view('notes.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'note' => 'required|string',
        ]);

        $formFields['user_id'] = $request->user()->id;

        Note::create($formFields);

        return redirect(route('note.index'))->with('message', 'Note created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        if($note->user_id !== request()->user()->id) {
            abort(403);
        };

        return view('notes.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if($note->user_id !== request()->user()->id) {
            abort(403);
        };

        return view('notes.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if($note->user_id !== request()->user()->id) {
            abort(403);
        };

        $formFields = $request->validate([
            'note' => 'required|string',
        ]);

        $note->update($formFields);

        return redirect(route('note.index'))->with('message', 'Note updated !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if($note->user_id !== request()->user()->id) {
            abort(403);
        };
        
        $note->delete();

        return redirect(route('note.index'))->with('message', 'note deleted!');
    }
}
