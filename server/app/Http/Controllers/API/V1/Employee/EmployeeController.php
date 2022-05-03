<?php

namespace App\Http\Controllers\API\V1\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Employee\SaveEmployeeResquest;
use App\Http\Resources\V1\Employee\EmployeeCollection;
use App\Http\Resources\V1\Employee\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Response;
use function response;

class EmployeeController extends Controller
{

    public function index(): EmployeeCollection
    {
        $employees = Employee::latestFirst()->paginate(5);
        return EmployeeCollection::make($employees);
    }

    public function show(Employee $employee): EmployeeResource
    {
        return EmployeeResource::make($employee);
    }

    public function store(SaveEmployeeResquest $request): EmployeeResource
    {
        $employee = Employee::create($request->validated());

        return EmployeeResource::make($employee);
    }

    public function update(SaveEmployeeResquest $request, Employee $employee): EmployeeResource
    {

        $employee->update($request->validated());

        return EmployeeResource::make($employee);
    }

    public function destroy(Employee $employee): Response
    {
        $employee->delete();
        return response()->noContent();
    }
}