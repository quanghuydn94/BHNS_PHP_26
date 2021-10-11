<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\nhanvien;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhanvien = nhanvien::all();
        return response()->view('panel.employee.index', ['nhanvien'=>$nhanvien]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all();
        return response()->view('panel.employee.create' );
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
                'name'=>'required|string',
                'phone'=>'required|max:15',
                'address'=>'required|string',
                'email'=>'required|string|email|unique:users',
                'password'=>'required|string|confirmed|min:8',
                'password_confirmation'=>'required|string',
                'identity'=>'required|string',
                'rolename'=>'required|string',
                'avatar'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'required' => ':attribute do not leave blank',
                'max' => ':attribute should be not more than :max',
                'confirmed' => ':attribute does not match',
                'email' => 'The :attribute must be a valid email address',
                'unique' => ':attribute existed',
            ]
        );

        if($validate->fails()) {
            return redirect()->route('employees.create')->withErrors($validate);
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img/users', $filename);
        }

        User::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'avatar'=> $filename,
            'address'=>$request->address,
            'rolename'=>$request->rolename,

        ]);


        $id = User::where('email', $request->email)->select('id')->first();
        $user_id = $id;

        $employee = new nhanvien;
        $employee->nhanvien_ten = $request->name;
        $employee->nhanvien_sdt = $request->phone;
        $employee->nhanvien_cmnd = $request->identity;
        $employee->nhanvien_diachi = $request->address;
        $employee->user_id = (int)$user_id->id;
        $employee->active = 1;
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
        $nhanvien = nhanvien::find($id);
        $user = User::where('id', '=', $nhanvien->user_id)->first();
        return response()->view('panel.employee.show',
            [
            'nhanvien'=>$nhanvien,
            'user'=>$user,
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
        $nhanvien = nhanvien::find((int)$id);
        $users = User::all();
        return response()->view('panel.employee.edit',
        [
            'nhanvien' => $nhanvien,
            'users' => $users,
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
        nhanvien::find((int)$id)->update([
            'nhanvien_ten' => $request->name,
            'nhanvien_sdt' => $request->phone,
            'nhanvien_diachi' => $request->address,
            'nhanvien_cmnd' => $request->identity,
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
        $nhanvien = nhanvien::find($id);
        $nhanvien->update(['active' => 0]);
        return redirect()->back();
    }
}
