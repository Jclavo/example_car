<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Car;

class CarController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars = Car::all();
        
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'make'=>'required',
            'model'=>'required',
            'produced_on'=>'required'
        ]);
        
        //$fillable = array('make', 'model', 'produced_on');
        
        $car = new Car([
            'make'        => $request->get('make'),
            'model'       => $request->get('model'),
            'produced_on' => $request->get('produced_on')
        ]);
        
        $car->save();
        return redirect('/cars')->with('success', 'Car saved!');
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
        //
        $car = Car::find($id);
        return view('cars.edit', compact('car')); 
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
        //
        
        $request->validate([
            'make'=>'required',
            'model'=>'required',
            'produced_on'=>'required'
        ]);
        
       
        $car = Car::find($id);
        $car->make          = $request->get('make');
        $car->model         = $request->get('model');
        $car->produced_on   = $request->get('produced_on');
        $car->save();
        
        return redirect('/cars')->with('success', 'Car updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $car = Car::find($id);
        $car->delete();
        
        return redirect('/cars')->with('success', 'car deleted!');
    }
}
