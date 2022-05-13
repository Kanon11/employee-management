<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityEditRequester;
use App\Http\Requests\CityStoreRequester;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities=City::all();
        if(!empty($request)){
            $cities=City::where('name','like','%'.$request->search.'%')->get();
        }
        return view('city.index',compact('cities'));
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states=State::all();
        return view('city.create',['states'=>$states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreRequester $request)
    {
        City::create($request->validated());
        return redirect()->route('city.index')->with('message',"City Created Successfully");
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $states=State::all();
        return view('city.edit',compact('states','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityEditRequester $request, City $city)
    {
        $city->update([
            'name' => $request->name,
            'state_id' => $request->state_id
        ]);
        return redirect()->route('city.index')->with('message', "City Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('city.index')->with('message', "City deleted Successfully");
    }
}
