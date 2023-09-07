<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $user = Employee::all();
        return response()->json(['employee' => $user], 200);
    }
    public function create(Request $request)
    {
        $user = $this->getUserData($request);
        Employee::create($user);
        return response()->json([
            'user' => $user,
            'status' => 'created',
        ], 200);
    }
    public function update(Request $request)
    {
        return $request->all();
        $employeeId = $request->employee_id;
        $user = Employee::where('id', $employeeId)->first();
        if (isset($user)) {
            $data = $this->getUserData($request);
            Employee::where('id', $employeeId)->update($data);
            return response()->json([
                'status' => 'updated',
                'user' => $user,
            ], 200, );
        } else {
            return response()->json([
                'status' => 'not found the id',
            ], 200);
        }

    }

    public function delete(Request $request)
    {
        $user = Employee::where('id', $request->employee_id)->first();
        if
        (isset($user)) {
            Employee::where('id', $request->employee_id)->delete();
            return response()->json([
                'status' => 'deleted',
            ], 200);
        } else {
            return response()->json([
                'status' => 'not found the id',
            ], 200);
        }
    }
    private function getUserData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'position' => $request->position,
        ];
    }
}
