<?php

namespace App\Http\Controllers;

use App\Models\Todo as ModelsTodo;
use Illuminate\Http\Request;

class Todo extends Controller
{
    // Get all Todos
    public function index(){
        try {
            $data = ModelsTodo::all();
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve Todos'], 500);
        }
    }

    // Get a single Todo by ID
    public function show($id){
        try {
            $Todo = ModelsTodo::findOrFail($id);
            return response()->json($Todo, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Todo not found'], 404);
        }
    }

    // Create a new Todo
    public function store(Request $request){
       $request->validate([
            'name' => 'required',
            'Todo_id' => 'required',
            'phone' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
        ]);

        try {
            $Todo = ModelsTodo::create($request->all());
            return response()->json($Todo, 201);
        } catch (\Throwable $e) {
            throw $e;
            return response()->json(['error' => 'Failed to create Todo',$e], 500);
        }
    }

    // Update a Todo by ID
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'Todo_id' => 'required',
            'phone' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
        ]);

        try {
            $Todo = ModelsTodo::findOrFail($id);
            $Todo->update($request->all());
            return response()->json($Todo, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update Todo'], 500);
        }
    }

    // Delete a Todo by ID
    public function destroy($id){
        try {
            $Todo = ModelsTodo::findOrFail($id);
            $Todo->delete();
            return response()->json(['message' => 'Todo deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete Todo'], 500);
        }
    }
}
