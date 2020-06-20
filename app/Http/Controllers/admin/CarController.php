<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Car;
class CarController extends Controller
{

    public function index()
    {
        $cars=Car::all();
        return view('adminpanel.test',compact('cars'));
    }

    public function store(Request $request)
   {
       Car::create($request->all());
       return redirect('adminpanel/car')->with('success', 'Car has been successfully added');
   }

   public function edit($id)
   {
     $car =Car::where('_id',$id)->get();
     return response()->json(['cars' => $car]);
   }

   public function update($id,Request $request)
   {
     $car =Car::find($id)->update($request->all());
     return redirect('adminpanel/car')->with('success', 'Car has been successfully updated');
   }

  public function destroy($id)
  {
    //dd('helelel');
    Car::find($id)->delete();
    return redirect('adminpanel/car')->with('success', 'Car has been successfully Deleted');
  }
}
