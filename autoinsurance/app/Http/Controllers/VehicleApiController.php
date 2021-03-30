<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Validation\Rule;

class VehicleApiController extends Controller
{
    
    public function index()
    {
        $vehicles = Vehicle::orderByDesc('insurance_date')->get();
        return response()->json([
            'status' => 'success',
            'vehicles' => $vehicles,
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'plate_number' => 'required|string|min:10|max:10|regex:/^[A-Z]{2}-[0-9]{4}-[A-Z]{2}$/|unique:vehicles,plate_number',
            'insurance_date' => 'required|date',
        ]);

        $vehicle = Vehicle::make();
        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->plate_number = $request->plate_number;
        $vehicle->insurance_date = $request->insurance_date;
        $vehicle->save();

        $response = [
            'vehicle' => $vehicle,
            'message' => 'Success. Vehicle created in database',
        ];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $response = [
            'vehicle' => Vehicle::find($id),
            'message' => 'Success. Vehicle data retrived',
        ];

        return response()->json($response);
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
        $vehicle = Vehicle::find($id);

        $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'plate_number' => [
                'required',
                'string',
                'min:10',
                'max:10',
                'regex:/^[A-Z]{2}-[0-9]{4}-[A-Z]{2}$/',
                Rule::unique('vehicles')->ignore($vehicle->id),
            ],
            'insurance_date' => 'required|date',
        ]);

        
        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->plate_number = $request->plate_number;
        $vehicle->insurance_date = $request->insurance_date;
        $vehicle->update();

        $response = [
            'vehicle' => $vehicle,
            'message' => 'Success. Vehicle updated in database',
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);

        $response = [
            'vehicle' => $vehicle,
            'message' => 'Success. Vehicle deleted from database',
        ];

        $vehicle->delete();

        return response()->json($response);
    }
}
