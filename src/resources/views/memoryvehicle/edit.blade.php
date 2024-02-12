{{-- src/resources/views/memoryvehicle/edit.blade.php --}}

@extends('memoryapp::layouts.app')

@section('content')
    <div class=" mx-auto container">
        <div class="p-4">
            <h1 class="text-xl">
                {{ trans('memoryapp::messages.vehicle.edit') }}
            </h1>
        </div>
        <div class="mx-4 pt-4 bg-white overflow-hidden shadow-xl rounded-lg p-5 mb-32">
            @include('memoryapp::memoryvehicle.partials.form', ['vehicle' => $vehicle])
        </div>
    </div>
@endsection
