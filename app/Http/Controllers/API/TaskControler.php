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

    // public function employeeTasks(Request $request){
        
    //     $employeeId= request()->get('id');
        
    //     $employee_tasks= Task::where('employee_id',$employeeId)->get();
        
    //     return response()->json($employee_tasks);
    // }
    // public function managerTasks(Request $request){
        
    //     $managerId= request()->get('id');
        
    //     $manager_tasks= Task::where('manager_id',$managerId)->get();
        
    //     return response()->json($manager_tasks);
    // }


    public function employeeTasks(Request $request)
    {
        $employeeId = $request->get('id'); 
        
        if (!$employeeId) {
            return response()->json(['error' => 'Employee ID is required'], 400);
        }

        
        $employee_tasks = Task::where('employee_id', $employeeId)->with('manager') ->get();

        $formattedTasks = $employee_tasks->map(function($task) {
            return [
                'task_id' => $task->id,
                'content' => $task->content,
                'due_date' => $task->due_date,
                'status' => $task->status,
                'manager_name' => $task->manager ? $task->manager->name : 'No manager',
            ];
        });

        return response()->json($formattedTasks);
    }

    
    public function managerTasks(Request $request)
    {
        $managerId = $request->get('id'); 
        if (!$managerId) {
            return response()->json(['error' => 'Manager ID is required'], 400);
        }
        $manager_tasks = Task::where('manager_id', $managerId)->with('employee')->get();
        
        $formattedTasks = $manager_tasks->map(function($task) {
            return [
                'task_id' => $task->id,
                'content' => $task->content,
                'due_date' => $task->due_date,
                'status' => $task->status,
                'employee_name' => $task->employee ? $task->employee->name : 'No employee',
            ];
        });

        return response()->json($formattedTasks);
    }

}
