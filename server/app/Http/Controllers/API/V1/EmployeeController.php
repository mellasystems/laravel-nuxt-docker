<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use http\Env\Request;
use function response;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function show(Employee $employee): Employee
    {
        return $employee;
    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
