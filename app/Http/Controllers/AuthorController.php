<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function showAllAuthors()
    {
        $data = Author::all();
        return response()->json(['success' => true, 'total' => count($data), 'data' => $data]);
    }

    public function showOneAuthor($id)
    {
        $data = Author::find($id);
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function create(Request $request)
    {
        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        Author::findOrFail($id)->delete();
        return response()->json(['success' => true, 'message' => "Delete Successfull"], 200);
    }
}
