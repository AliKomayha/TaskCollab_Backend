<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_task= Task::create($request->all());
        return response()->json([
            'status'=>true,
            'message'=>"Task Created Successfully",
            'data'=>$new_task
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function employeeTasks(Request $request){
        
        $employeeId= request()->get('id');
        
        $employee_tasks= Task::where('employee_id',$employeeId)->get();
        
        return response()->json($employee_tasks);
    }
}
