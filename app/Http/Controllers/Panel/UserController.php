<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = User::all();

        return view('panel.users.index', compact('list'));
    }
    public function employee()
    {
        $list = User::all();

        return view('panel.users.employee', compact('list'));
    }
     public function client()
    {
        $list = User::all();

        return view('panel.users.client', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
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

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $detail = User::findOrFail($id);

    // return view('panel.users.profile-details');

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
        $data = User::findOrFail($id);

        return view('panel.users.edit', compact('data'));
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
        $rules = [
            'name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|string',
            'avatar' => 'required|string',
        ];
        $request->validate($rules);

        $data = User::findOrFail($id);
        $data->update($request->all());

        return redirect(route('users.index'));
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
        $data = User::findOrFail($id);
        $data->delete();

        return redirect()->back();
    }
}
