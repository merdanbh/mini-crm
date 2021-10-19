<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('employees.index', [
            'employees' => Employee::with(['company'])
                ->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        $employee = new Employee();
        $companies = Company::all();
        return view('employees.create', compact('employee', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\EmployeeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmployeeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        Employee::create($validated);

        return redirect()
            ->route('employees.index')
            ->with('status', 'Employee created.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Employee $employee): \Illuminate\Contracts\View\View
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Employee $employee): \Illuminate\Contracts\View\View
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\EmployeeRequest $request
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $validated = $request->validated();
        $employee->update($validated);

        return redirect()
            ->route('employees.index')
            ->with('status', 'Employee updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Employee $employee): \Illuminate\Http\RedirectResponse
    {
        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('status', 'Employee deleted.');
    }
}
