<?php

namespace App\Http\Controllers;

use App\Http\Requests\StateStoreRequester;
use App\Http\Requests\StateUpdateRequester;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states=State::all();
        if (!empty($request)) {
            $states=State::where('name','like','%'.$request->search.'%')->get();
        }
        return view('state.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Country::all();
        return view('state.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateStoreRequester $request)
    {
        State::create($request->validated());
        return redirect()->route('state.index')->with('message',"State Stored Successfully");
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
    public function edit(State $state)
    {
        $countries=Country::all();
        return view('state.edit',compact('state','countries'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StateUpdateRequester $request, State $state)
    {
        $state->update([
            'name'=>$request->name,
            'country_id'=>$request->country_id
        ]);
        
        return redirect()->route('state.index')->with('message', "State Updated Successfully");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('state.index')->with('message', "State Deleted Successfully");
    }
}
