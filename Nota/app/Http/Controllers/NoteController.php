<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){ // devuelve todas las notas
        $notes = Note::orderBy('id','desc')->paginate();
        return view('notes.index', compact('notes'));
    }

    public function create(){ //crear una nota
        return view('notes.create');
    }

    public function store(Request $request){ //guardar una nota
        $note = new Note;
        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();
        return redirect()->route('notes.show', $note->id);
    }

    public function show($id){ //mostrar una nota por id
        $note = Note::findOrFail($id);
        return view('notes.show', compact('note'));
    }
    
    public function edit($id){ //editar una nota
        $note = Note::find($id);
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, $id){ //actualizar una nota
        $note = Note::find($id);
        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();
        return redirect()->route('notes.show', $note->id);
    }

    public function confirmDelete($id){ //confirmar eliminar una nota
        $note = Note::find($id);
        return view('notes.confirmDelete', compact('note'));
    }

    public function delete($id){ //eliminar una nota
        $note = Note::find($id);
        $note->delete();
        return redirect()->route('notes.index');
    }
}
