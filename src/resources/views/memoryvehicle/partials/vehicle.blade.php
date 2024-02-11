{{--{{ $vehicle }}--}}
<div class="bg-white w-full shadow-xl sm:rounded-lg p-5 ">
    <div class="flex justify-start space-x-4">
        <div class="text-2xl">
            <a href="{{ route('memory.vehicles.show', $vehicle->uuid) }}"
               class="text-blue-600 hover:text-blue-900">
                {{ $vehicle->brand }} {{ $vehicle->model }}
            </a>
            <span class="text-sm">
            {{ $vehicle->year }}
        </span>
        </div>
        @include('memoryapp::memoryvehicle.partials.plate', ['plate' => $vehicle->plate_number])
    </div>
    <hr>
    <a href="{{ route('memory.vehicles.edit', $vehicle) }}"
       class="text-indigo-600 hover:text-indigo-900">{{ trans('memoryapp::messages.general.Edit') }}</a>
    <div class="flex">
        <div class="border px-4 py-2 bg-indigo-50 w-1/3 rounded-lg shadow">
            <div>
                Drivstoff
            </div>
            <div>
                @if($vehicle->latestFuel)
                    <table class="w-full">
                        <thead class="text-left">
                        <tr>
                            <th>
                                Date
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Total sum
                            </th>
                            <th>

                            </th>
                        </tr>
                        </thead>
                        <tr>
                            <td>
                                <a href="{{ route('memory.vehicles.fuel.show', ['vehicle_uuid' => $vehicle->uuid, 'fuel' => $vehicle->latestFuel->uuid]) }}"
                                   class="text-blue-600 hover:text-blue-900">
                                    {{ $vehicle->latestFuel->date_of_fuel }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('memory.vehicles.fuel.show', ['vehicle_uuid' => $vehicle->uuid, 'fuel' => $vehicle->latestFuel->uuid]) }}"
                                   class="text-blue-600 hover:text-blue-900">
                                    {{ $vehicle->latestFuel->fuel_quantity }} l
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('memory.vehicles.fuel.show', ['vehicle_uuid' => $vehicle->uuid, 'fuel' => $vehicle->latestFuel->uuid]) }}"
                                   class="text-blue-600 hover:text-blue-900">
                                    {{ $vehicle->latestFuel->total_price }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('memory.vehicles.fuel.create', ['vehicle_uuid' => $vehicle->uuid]) }}"
                                   class="hover:text-indigo-900 bg-green-400 hover:bg-green-500 px-2 py-1 rounded text-green-900 shadow transition duration-300">
                                    <i class="fa-solid fa-fw fa-gas-pump"></i>
                                    {{ trans('memoryapp::messages.general.New') }}
                                </a>
                            </td>
                        </tr>
                    </table>
                @else
                    <div class="italic">
                        {{ trans('memoryapp::messages.vehicle.fuel.no_fuel') }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
