<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\User;

class NoteController extends Controller
{


        public function __construct()
    {
    $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::where('user_id', auth()->user()->id)
                  ->orderBy('updated_at', 'DESC')
                  ->get();
 
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
 
            'title' => 'required',
     
            'body' => 'required',
     
            ]);
     
            $note = Note::create([
                'user_id' => $request->user()->id,
                'title'   => $request->title,
                'body'    => $request->body
                ]);
            return redirect()->route('note.index')
     
                    ->with('success','Note created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        
        return view('notes.show',compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return view('notes.edit',compact('note'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            ]);
     

            $note->update($request->all());

     
            return redirect()->route('note.index')->with('success','Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
 
 
 
        return redirect()->route('note.index')
 
                ->with('success','Note deleted successfully');
    }
}
