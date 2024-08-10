<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    // Fetch all TODOs
    public function index()
    {
        return Todo::all();
    }

    // Store a new TODO
    public function store(Request $request)
    {
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();

        return response()->json($todo);
    }

    // Delete a TODO by ID
    public function destroy($id)
    {
        $todo = Todo::find($id);
        if ($todo) {
            $todo->delete();
            return response()->json(['success' => 'Todo deleted successfully']);
        } else {
            return response()->json(['error' => 'Todo not found'], 404);
        }
    }
}
