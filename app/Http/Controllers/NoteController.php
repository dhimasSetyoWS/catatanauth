<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $userid = Auth::user()->id;
        $notes = Note::all()->where('user_id' , '=' , $userid);
        return view('dashboard' , compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'note' => 'required'
        ]);
        $note = Note::create([
            'note' => $request->note,
            'user_id' => Auth::user()->id
        ]);
        if ($note) {
            session()->flash('created' , 'Note Berhasil Di Tambahkan!');
            return redirect()->route('dashboard');
        }
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $note = Note::find($id);
        return view('note.show' , compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $note = Note::find($id);
        return view('note.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $note = Note::find($id);
        if ($note->note == $request->note) {
            session()->flash('updated' , 'similar');
            return redirect()->route('dashboard');
        }
        $updated = Note::find($id)->update($request->all());
        if ($updated) {
            session()->flash('updated' , 'Note Berhasil Di Update!');
        }
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = Note::destroy($id);
        if($deleted) {
            session()->flash('deleted' , 'Note Berhasil Di Hapus!');
        }
        return redirect()->route('dashboard');
    }
}
