<?php

namespace Ekstremedia\MemoryApp\Http\Controllers;

use Illuminate\Routing\Controller;
use Ekstremedia\MemoryApp\Models\MemoryVehicle;
use Illuminate\Http\Request;

class MemoryVehicleController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // Fetch vehicles that were created by the logged-in user
        $vehicles = MemoryVehicle::where('created_by_id', $userId)
            ->with('latestFuel')
            ->get();

        return view('memoryapp::memoryvehicle.index', compact('vehicles'));
    }

    public function create()
    {
        $fields = $this->getFormFields();
        return view('memoryapp::memoryvehicle.create', compact('fields'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateRequest($request);
        MemoryVehicle::create($validatedData);
        return redirect()->route('memory.vehicles.index')->with('success', 'Vehicle created successfully.');
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

    public function update(Request $request, MemoryVehicle $vehicle)
    {
        $validatedData = $this->validateRequest($request);
        $vehicle->update($validatedData);
        return redirect()->route('memory.vehicles.index')->with('success', "Vehicle $vehicle->name updated successfully.");
    }

    public function destroy(MemoryVehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('memory.vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }

    private function getFormFields()
    {
        return [
            ['name' => 'brand', 'type' => 'text', 'label' => 'Brand', 'required' => true],
            ['name' => 'model', 'type' => 'text', 'label' => 'Model', 'required' => true],
            ['name' => 'plate_number', 'type' => 'text', 'label' => 'Plate Number', 'required' => true],
            ['name' => 'name', 'type' => 'text', 'label' => 'Name', 'required' => false],
            ['name' => 'year', 'type' => 'text', 'label' => 'Year', 'required' => false],
            ['name' => 'registration_date', 'type' => 'date', 'label' => 'Registration Date', 'required' => false],
            ['name' => 'first_registration_date', 'type' => 'date', 'label' => 'First Registration Date', 'required' => false],
            ['name' => 'registration_country', 'type' => 'text', 'label' => 'Registration Country', 'required' => false],
            ['name' => 'registration_district', 'type' => 'text', 'label' => 'Registration District', 'required' => false],
            ['name' => 'type', 'type' => 'text', 'label' => 'Type', 'required' => false],
            ['name' => 'vin', 'type' => 'text', 'label' => 'VIN', 'required' => false],
            ['name' => 'owner_name', 'type' => 'text', 'label' => 'Owner Name', 'required' => false],
            ['name' => 'owner_address', 'type' => 'text', 'label' => 'Owner Address', 'required' => false],
//            ['name' => 'technical_classification', 'type' => 'text', 'label' => 'Technical Classification', 'required' => false],
            ['name' => 'color', 'type' => 'text', 'label' => 'Color', 'required' => false],
            ['name' => 'seating_capacity', 'type' => 'number', 'label' => 'Seating Capacity', 'required' => false],
//            ['name' => 'standing_capacity', 'type' => 'number', 'label' => 'Standing Capacity', 'required' => false],
            ['name' => 'fuel_type', 'type' => 'text', 'label' => 'Fuel Type', 'required' => false],
            ['name' => 'engine_performance', 'type' => 'number', 'label' => 'Engine Performance', 'required' => false],
            ['name' => 'permitted_total_weight', 'type' => 'number', 'label' => 'Permitted Total Weight', 'required' => false],
            ['name' => 'empty_vehicle_weight', 'type' => 'number', 'label' => 'Empty Vehicle Weight', 'required' => false],
            ['name' => 'permitted_load_weight', 'type' => 'number', 'label' => 'Permitted Load Weight', 'required' => false],
            ['name' => 'registration_status', 'type' => 'text', 'label' => 'Registration Status', 'required' => false],
            ['name' => 'vehicle_status', 'type' => 'text', 'label' => 'Vehicle Status', 'required' => false],
            ['name' => 'weight', 'type' => 'number', 'label' => 'Weight', 'required' => false],
            ['name' => 'width', 'type' => 'number', 'label' => 'Width', 'required' => false],
            ['name' => 'condemned', 'type' => 'checkbox', 'label' => 'Condemned', 'required' => false],
        ];
    }

    private function validateRequest(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'registration_country' => 'nullable|string|max:255',
            'plate_number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'nullable|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'type' => 'nullable|string|max:255',
            'vin' => 'nullable|string|max:255',
            'registration_date' => 'nullable|date',
            'first_registration_date' => 'nullable|date',
            'owner_name' => 'nullable|string|max:255',
            'owner_address' => 'nullable|string|max:255',
            'technical_classification' => 'nullable|string|max:255',
            'registration_district' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'seating_capacity' => 'nullable|integer',
            'standing_capacity' => 'nullable|integer',
            'fuel_type' => 'nullable|string|max:255',
            'engine_performance' => 'nullable|integer',
            'permitted_total_weight' => 'nullable|integer',
            'empty_vehicle_weight' => 'nullable|integer',
            'permitted_load_weight' => 'nullable|integer',
            'registration_status' => 'nullable|string|max:255',
            'vehicle_status' => 'nullable|string|max:255',
            'weight' => 'nullable|integer',
            'width' => 'nullable|integer',
            'condemned' => 'nullable|boolean'
        ]);
        $validatedData['created_by_id'] = auth()->id(); // Set the creator's user ID

        return $validatedData;
    }
}
