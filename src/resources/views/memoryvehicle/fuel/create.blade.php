{{-- resources/views/memoryvehicle/fuel/create.blade.php --}}
@extends('memoryapp::layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            Fuel for {{ $vehicle->brand }} {{ $vehicle->model }} ({{ $vehicle->name }})
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            @include('memoryapp::memoryvehicle.fuel.partials.form')
        </div>
    </div>
@endsection
