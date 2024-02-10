{{-- resources/views/memoryvehicle/index.blade.php --}}

@extends('memoryapp::layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p class="font-bold">Success</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="py-4">
            <h1 class="text-2xl font-semibold leading-tight">Vehicles</h1>
            <a href="{{ route('memory.vehicles.create') }}">Add New Vehicle</a>
            <!-- Add your table of vehicles here -->
        </div>

        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                @include('memoryapp::memoryvehicle.partials.vehicles_table', ['vehicles' => $vehicles])
            </div>
        </div>
    </div>
@endsection