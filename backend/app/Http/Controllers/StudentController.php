<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Get all students
    public function index(){
        try {
            $data = Student::all();
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve students'], 500);
        }
    }

    // Get a single student by ID
    public function show($id){
        try {
            $student = Student::findOrFail($id);
            return response()->json($student, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Student not found'], 404);
        }
    }

    // Create a new student
    public function store(Request $request){
       $request->validate([
            'name' => 'required',
            'student_id' => 'required',
            'phone' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
        ]);

        try {
            $student = Student::create($request->all());
            return response()->json($student, 201);
        } catch (\Throwable $e) {
            throw $e;
            return response()->json(['error' => 'Failed to create student',$e], 500);
        }
    }

    // Update a student by ID
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'student_id' => 'required',
            'phone' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
        ]);

        try {
            $student = Student::findOrFail($id);
            $student->update($request->all());
            return response()->json($student, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update student'], 500);
        }
    }

    // Delete a student by ID
    public function destroy($id){
        try {
            $student = Student::findOrFail($id);
            $student->delete();
            return response()->json(['message' => 'Student deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete student'], 500);
        }
    }
}

