<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rolename == 'admin' || Auth::user()->rolename == 'employee' ) {
            $employees = Employee::all();
            return response()->view('panel.employee.index', ['employees' => $employees]);
        } else {
            Auth::logout();
            return redirect('/')->withErrors('These credential does not match our records.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all();
        return response()->view('panel.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required|string', //set validate for input of form
                'phone' => 'required|max:15',
                'address' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|confirmed|min:8',
                'password_confirmation' => 'required|string',
                'identity' => 'required|string',
                'rolename' => 'required|string',
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [ // errors message
                'required' => ':attribute do not leave blank',
                'max' => ':attribute should be not more than :max',
                'confirmed' => ':attribute does not match',
                'email' => 'The :attribute must be a valid email address',
                'unique' => ':attribute existed',
            ]
        );

        if ($validate->fails()) {
            return redirect()->route('employees.create')->withErrors($validate); // throw error when your enter is incorrect the fields

        }

        if ($request->hasFile('avatar')) { //upload file image, set extension
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img/users', $filename);
        }

        User::create([ // add values to attribute of object user
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $filename,
            'address' => $request->address,
            'rolename' => $request->rolename,

        ]);

        $id = User::where('email', $request->email)->select('id')->first(); // get id of user account and then add to column user_id of table Employee
        $user_id = $id;

        $employee = new Employee;
        $employee->employee_name = $request->name;
        $employee->employee_phone = $request->phone;
        $employee->employee_identity = $request->identity;
        $employee->employee_address = $request->address;
        $employee->user_id = (int) $user_id->id;
        $employee->active = 1; //this coloum to hide/show information of this  employee when active = 0/1
        $employee->save();
        return redirect()->route('employees.index')->with('success', 'your registered successful!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        $user = User::where('id', '=', $employee->user_id)->first(); // get value of two table: employees and users by get user_id from employees table
        return response()->view('panel.employee.show',
            [
                'employee' => $employee,
                'user' => $user,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find((int) $id); // get value of employee you chosen by Id
        $userId = (int) $employee->user_id;
        $user = User::find($userId);
        return response()->view('panel.employee.edit',
            [
                'employee' => $employee,
                'users' => $user,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'identity' => 'required|string',
        ];
        $request->validate($rules);
        Employee::find((int) $id)->update([
            'employee_name' => $request->name,
            'employee_phone' => $request->phone,
            'employee_address' => $request->address,
            'employee_identity' => $request->identity,
        ]);

        $userId = (int) (Employee::find((int) $id)->user_id);
        $user = User::find($userId);
        if (!$request->has('avatar')) {
            $filename = $user->avatar; // if the input avatar does not have value of image and you dont want to change avatar, assign value for this input from users data table
        } else {
            $file = $request->avatar;
            $extension = $file->getClientOriginalExtension(); //if you want to change this avatar, choose file in here.
            $filename = time() . '.' . $extension;
            $file->move('img/users', $filename);
        }
        User::find($userId)->update([
            'avatar' => $filename,
        ]);

        return redirect()->route('employees.index')->with('success', 'your updated successful!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->update(['active' => 0]); // ser column active = 0, to hide information of employee you want to delete, avoid   foreign key error
        return redirect()->back();
    }
}
