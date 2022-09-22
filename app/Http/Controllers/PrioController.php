<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaraCrud;

class PrioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prio = LaraCrud::all();
        return view('index', compact('prio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'prio' => 'required|max:255',
            'samenvatting' => 'required|max:255',
        ]);
        $prio = LaraCrud::create($storeData);
        return redirect('/prios')->with('completed', 'prio has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prio = LaraCrud::findOrFail($id);
        return view('edit', compact('prio'));
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
        $updateData = $request->validate([
            'prio' => 'required|max:255',
            'samenvatting' => 'required|max:255',
            'status' => 'required|max:255',
        ]);
        LaraCrud::whereId($id)->update($updateData);
        return redirect('/prios')->with('completed', 'prio has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = LaraCrud::findOrFail($id);
        $student->delete();
        return redirect('/prios')->with('completed', 'prio has been deleted');
    }
}
