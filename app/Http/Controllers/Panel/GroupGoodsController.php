<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\GroupGoods;
use Illuminate\Http\Request;

class GroupGoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupGoods = GroupGoods::all();

        return response()->view('panel.groupGoods.index', compact('groupGoods'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('panel.groupGoods.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'group_name' => 'required|string',
            'group_image' => 'required|image',
            'group_description' => 'required|string',
        ];
        $request->validate($rules);
        if ($request->hasFile('group_image')) { //upload file image, set extension
            $file = $request->file('group_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img/groupgoods', $filename);
        }
        GroupGoods::create([
            'group_name' => $request->group_name,
            'group_image' => $filename,
            'group_description' => $request->group_description,
            'active'=>1,
        ]);

        return redirect(route('groupgoods.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groupgood = GroupGoods::findOrFail($id);

        return response()->view('panel.groupGoods.showdetail', compact('groupgood'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groupgood = GroupGoods::findOrFail($id);

        return response()->view('panel.groupGoods.edit', compact('groupgood'));

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
        // $rules = [
        //     'group_name' => 'required|string',
        //     'group_image' => 'required|image',
        //     'group_description' => 'required|string',
        // ];
        // $request->validate($rules);

        $groupgoods = GroupGoods::find((int)$id);
        if ($request->hasFile('group_image')) { //upload file image, set extension
            $file = $request->file('group_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img', $filename);
        } else {
            $filename = $groupgoods->group_image;
        }
        GroupGoods::find((int)$id)->update([
            'group_name' => $request->group_name,
            'group_image' => $filename,
            'group_description' => $request->group_description,
        ]);

        return redirect(route('groupgoods.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groupgood = GroupGoods::findOrFail($id);
        $groupgood->update(['active'=>0]);

        return redirect()->back();

    }
}
