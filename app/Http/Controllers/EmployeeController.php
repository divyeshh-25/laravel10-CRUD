<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDataTable;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /* <== Display a listing of the employees ==> */
    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render('employee');
    }

    /* <== Render view to create new employee ==> */
    public function create()
    {

        $view = view('components.form', ['title' => 'save'])->render();

        return response()->json([
            'status' => true,
            'view' => $view,
        ]);
    }
    /* <== Store new employee data ==> */
    public function store(EmployeeRequest $request)
    {
        $flag = Employee::create($request->validated());
        if ($flag) {
            return response()->json([
                'status' => true,
                'message' => 'Employee Added',
            ]);
        }
    }
    /* <== show single employee data ==> */
    public function show(string $id)
    {
        //
    }

    /* <==  Render view to edit employee ==> */
    public function edit(Employee $employee)
    {
        $view = view('components.form', ['title' => 'update', 'employee' => $employee])->render();

        return response()->json([
            'status' => true,
            'view' => $view,
        ]);
    }

    /* <==  store edit employee detail ==> */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $flag = $employee->update($request->validated());
        if ($flag) {
            return response()->json([
                'status' => true,
                'message' => 'Employee Updated',
            ]);
        }
    }

    /* <==  trash employee ==> */
    public function destroy(Employee $employee)
    {
        $flag = $employee->delete();
        if ($flag) {
            return response()->json([
                'status' => true,
                'message' => 'Employee Removed',
            ]);
        }
    }

    /* <==  restore trashed employee ==> */
    public function restore(Employee $employee)
    {
        $flag = $employee->restore();
        if ($flag) {
            return response()->json([
                'status' => true,
                'message' => 'Employee Restored',
            ]);
        }
    }

    /* <==  permanently delete employee ==> */
    public function delete(Employee $employee)
    {
        $flag = $employee->forceDelete();
        if ($flag) {
            return response()->json([
                'status' => true,
                'message' => 'Employee Deleted',
            ]);
        }
    }
}
