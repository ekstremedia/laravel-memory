{{-- src/resources/views/memoryvehicle/partials/form.blade.php --}}
<form method="POST"
      action="{{ isset($vehicle) ? route('memory.vehicles.update', $vehicle) : route('memory.vehicles.store') }}">
    @csrf
    @if(isset($vehicle))
        @method('PUT')
    @endif

    @foreach ($fields as $field)
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $field['name'] }}">
                {{ $field['label'] }} @if($field['required']) <span class="text-red-700">*</span> @endif
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error($field['name']) border-red-500 @enderror"
                   id="{{ $field['name'] }}"
                   type="{{ $field['type'] }}"
                   name="{{ $field['name'] }}"
                   value="{{ old($field['name'], isset($vehicle) ? $vehicle->{$field['name']} : null) }}"
                   placeholder="{{ $field['label'] }}"
                    {{ $field['required'] ? 'required' : '' }}>

            @error($field['name'])
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    @endforeach

    <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            {{ isset($vehicle) ? 'Update' : 'Create' }}
        </button>
    </div>
</form>
