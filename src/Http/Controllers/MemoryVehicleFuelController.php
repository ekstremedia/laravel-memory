<?php

namespace Ekstremedia\MemoryApp\Http\Controllers;

use Ekstremedia\MemoryApp\Models\MemoryVehicleFuel;
use Illuminate\Routing\Controller;
use Ekstremedia\MemoryApp\Models\MemoryVehicle;
use Illuminate\Http\Request;

class MemoryVehicleFuelController extends Controller
{

    public function index()
    {
        $userId = auth()->id();

        // Fetch vehicles that were created by the logged-in user
        $vehicles = MemoryVehicle::where('created_by_id', $userId)->get();

        return view('memoryapp::memoryvehicle.fuel.index', compact('vehicles'));
    }

    public function create($vehicle_uuid)
    {
        $vehicle = MemoryVehicle::where('uuid', $vehicle_uuid)->first();

        if (!$vehicle) {
            return redirect()->back()->with('error', 'Vehicle not found.');
        }
        $fields = $this->getFormFields();
        return view('memoryapp::memoryvehicle.fuel.create', compact('fields', 'vehicle'));
    }

    public function store(Request $request, $vehicle_uuid)
    {
        $vehicle = MemoryVehicle::where('uuid', $vehicle_uuid)->firstOrFail();

        $validatedData = $this->validateRequest($request);


        $validatedData['vehicle_id'] = $vehicle->id;
        $validatedData['created_by_id'] = auth()->id(); // If you're tracking who created the fuel entry

        MemoryVehicleFuel::create($validatedData);

        return redirect()->route('memory.vehicles.index')->with('success', 'Vehicle fuel created successfully.');
    }


    public function show(MemoryVehicle $vehicle)
    {
        return view('memoryapp::memoryvehicle.show', compact('vehicle'));
    }

    public function edit(MemoryVehicle $vehicle)
    {
        $fields = $this->getFormFields();
        return view('memoryapp::memoryvehicle.edit', compact('vehicle', 'fields'));
    }

    public function update(Request $request, MemoryVehicleFuel $fuel)
    {
//        $validatedData = $this->validateRequest($request);
//        $vehicle->update($validatedData);
//        return redirect()->route('memory.vehicles.index')->with('success', "Vehicle $vehicle->name updated successfully.");
    }

    public function destroy(MemoryVehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('memory.vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }

    private function getFormFields()
    {
        return [
            ['name' => 'date_of_fuel', 'type' => 'date', 'label' => 'Fueling Date', 'required' => true],
            ['name' => 'fuel_quantity', 'type' => 'text', 'label' => 'Fuel quantity (liter)', 'required' => true],
            ['name' => 'total_price', 'type' => 'text', 'label' => 'Total price', 'required' => false],
            ['name' => 'fuel_price', 'type' => 'text', 'label' => 'Fuel price (per liter)', 'required' => false],
            ['name' => 'fuel_type', 'type' => 'text', 'label' => 'Fuel type', 'required' => false],
            ['name' => 'fuel_station_name', 'type' => 'text', 'label' => 'Fuel Station Name', 'required' => false],
            ['name' => 'mileage', 'type' => 'number', 'label' => 'Mileage', 'required' => false],
        ];
    }

    private function validateRequest(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'total_price' => 'nullable|numeric',
            'fuel_price' => 'nullable|numeric',
            'fuel_quantity' => 'required|numeric',
            'fuel_type' => 'nullable|string|max:255',
            'date_of_fuel' => 'required|date',
            'mileage' => 'nullable|integer',
        ]);
        $validatedData['created_by_id'] = auth()->id(); // Set the creator's user ID

        return $validatedData;
    }
}
