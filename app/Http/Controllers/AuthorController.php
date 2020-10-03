<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAllAuthors()
    {
        $author = Author::all();
        if (count($author) == null) {
            return response()->json(["success" => true, "message" => "Author Data is empty"], 404);
        }
        return response()->json(['success' => true, 'total' => count($author), 'data' => $author]);
    }

    public function showOneAuthor($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(["success" => false, "message" => "Data Not Found"], 404);
        }
        return response()->json(['success' => true, 'data' => $author]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string",
            "email" => "required|string",
            "github" => "string",
            "latest_article_published" => "string",
        ]);
        $author = Author::create($request->all());
        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {

        $author = Author::find($id);
        if (!$author) {
            return response()->json(["success" => false, "message" => "No Data With This ID"], 404);
        }
        $this->validate($request, [
            "name" => "required|string",
            "email" => "required|string",
            "github" => "string",
            "latest_article_published" => "string",
        ]);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(["success" => false, "message" => "No Data With This ID"], 404);
        }
        $author->delete();
        return response()->json(['success' => true, 'message' => "Delete Successfull"], 200);
    }
}
