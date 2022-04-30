<?php

namespace Tests\Feature\Employees;

use App\Models\Employee;
use Database\Factories\EmployeeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListEmployeeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_fetch_a_single_employee()
    {
        $this->withoutExceptionHandling();

        $employee = Employee::factory()->create();

        $response = $this->getJson('/api/v1/employees/'.$employee->getRouteKey());

        $response->assertSee($employee->name);
    }
}
