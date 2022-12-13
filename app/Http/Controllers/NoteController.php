<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Affiche toutes les notes
     *
     * @response 200
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse
     */
    public function getAllNotes()
    {
        return Note::orderBy('id', 'ASC')->get();
    }

    /**
     * Affiche une note en fonction de son id
     *
     * @response 200
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse
     */
    public function getOneNote($id)
    {
        return Note::findOrFail($id);
    }

    /**
     * Modifie une note
     *
     * @response 200
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse
     */
    public function updateNote($id, Request $request)
    {
        $this->validate($request, Note::validateRules());
        Note::findOrFail($id)->update($request->all());
        return Note::findOrFail($id);
    }

    /**
     * Créer une note
     *
     * @response 200
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse
     */
    public function createNote(Request $request)
    {
        $this->validate($request, Note::validateRules());
        return Note::create($request->all());
    }

    /**
     * Supprime une note
     *
     * @response 201
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function deleteNote($id)
    {
        Note::findOrFail($id)->delete();
        return response('', 204);
    }

    /**
     * update instrumental
     *
     *
     */
    public function updateInstrumental($id, Request $request)
    {
        $note = Note::findOrFail($id);
        $note->instrumental = $request->instrumental;
        $note->update();
        return Note::findOrFail($id);
    }
}
