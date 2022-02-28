<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id'       => 'required|unique:employees',
            'classification'    => 'required',
            'fullname'          => 'required',
            'date_of_birth'     => 'required',
            'gender'            => 'required',
            'phone_number'      => 'required|min:10|numeric|unique:employees',
            'id_card'           => 'required|unique:employees',
            'email'             => 'required|email|unique:employees',
            'address'           => 'required',
        ]);
        $employee = new Employee([
            'employee_id'   => $request->get('employee_id'),
            'classification'=> $request->get('classification'),
            'fullname'      => $request->get('fullname'),
            'date_of_birth' => $request->get('date_of_birth'),
            'gender'        => $request->get('gender'),
            'phone_number'  => $request->get('phone_number'),
            'id_card'       => $request->get('id_card'),
            'email'         => $request->get('email'),
            'address'       => $request->get('address'),
        ]);
        $employee->save();
        return redirect('/employee')->with('success', 'Thêm mới nhân viên thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employee.view',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'classification'    => 'required',
            'fullname'          => 'required',
            'date_of_birth'     => 'required',
            'gender'            => 'required',
            'phone_number'      => 'required|min:10|numeric',
            'id_card'           => 'required|min:9',
            'email'             => 'required|email',
            'address'           => 'required',
        ]);
        $employee = Employee::find($id);
        $employee->classification   = $request->get('classification');
        $employee->fullname         = $request->get('fullname');
        $employee->date_of_birth    = $request->get('date_of_birth');
        $employee->gender           = $request->get('gender');
        $employee->phone_number     = $request->get('phone_number');
        $employee->id_card          = $request->get('id_card');
        $employee->email            = $request->get('email');
        $employee->address          = $request->get('address');
        $employee->update();

        return redirect('/employee')->with('success', 'Cập nhật dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/employee')->with('success', 'Xóa dữ liệu thành công');
    }
}
