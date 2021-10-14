<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\DB as FacadesDB;

class UserController extends Controller
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
        if (Auth::user()->rolename == 'admin') {

            $list = User::all();

            return response()->view('panel.users.index', compact('list'));
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
        if (Auth::user()->rolename == 'admin') {
            return response()->view('panel.users.create');
        } else {
            Auth::logout();
            return redirect('/')->withErrors('These credential does not match our records.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->rolename == 'admin') {
            $rules = [
                'name' => 'required|string',
                'phone' => 'required|string',
                'address' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|string',
                'avatar' => 'required|string',
                'rolename' => 'required|string',
            ];
            $request->validate($rules);

            User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'avatar' => $request->avatar,
                'rolename' => $request->rolename,
            ]);
            $user = User::select('id')->where('email', $request->email)->first();

            Employee::create([
                'nhanvien_ten' => $request->name,
                'nhanvien_sdt' => $request->phone,
                'nhanvien_diachi' => $request->address,
                'nhanvien_cmnd' => $request->rolename,
                'user_id' => (int) $user->id,
            ]);

            return redirect(route('users.index'));
        } else {
            Auth::logout();
            return redirect('/')->withErrors('These credential does not match our records.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->rolename == 'admin') {

            $user = User::find($id);
            return response()->view('panel.users.showUser', ['user' => $user]);
        } else {
            Auth::logout();
            return redirect('/')->withErrors('These credential does not match our records.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //     $data = User::findOrFail($id);

        //     return view('panel.users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $rules = [
        //     'name' => 'required|string',
        //     'phone' => 'required|string',
        //     'address' => 'required|string',
        //     'email' => 'required|email',
        //     'password' => 'nullable|string',
        //     'avatar' => 'required|string',
        // ];
        // $request->validate($rules);

        // $data = User::findOrFail($id);
        // $data->update($request->all());

        // return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->rolename == 'admin') {
            $data = User::find($id);
            $data->update(['active' => 0]);

            return redirect()->back();
        } else {
            Auth::logout();
            return redirect('/')->withErrors('These credential does not match our records.');
        }
    }
}
