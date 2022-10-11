<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(){
        return view('form');
    }
    public function store(Request $request){
//        dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees|max:255',
            'age' => 'required',
            'contact_no' => 'required|unique:employees|max:255',
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->contact_no = $request->contact_no;
        $employee->age = $request->age;
        $employee->save();
        return redirect('form')->with('status','Form Data Has Been validated and insert');

    }
}
