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
                {{ trans("memoryapp::messages.vehicle." . $field['name']) }} @if($field['required'])
                    <span class="text-red-700">*</span>
                @endif
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error($field['name']) border-red-500 @enderror"
                id="{{ $field['name'] }}"
                type="{{ $field['type'] }}"
                name="{{ $field['name'] }}"
                value="{{ old($field['name'], isset($vehicle) ? $vehicle->{$field['name']} : null) }}"
                placeholder="{{ trans("memoryapp::messages.vehicle." . $field['name']) }}"
                {{ $field['required'] ? 'required' : '' }}>

            @error($field['name'])
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    @endforeach

    <div class="fixed inset-x-0 bottom-0 p-4  border-t bg-slate-300/80 flex items-center space-x-2 justify-end border-t-gray-400">
        <button
            class="bg-green-700 hover:bg-green-700 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline"
            type="submit">
            <i class="fa fa-check"></i>
            {{ isset($vehicle) ? trans("memoryapp::messages.general.Update") : trans("memoryapp::messages.general.Save") }}
        </button>
        <a href="{{ url()->previous() }}"
           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Cancel
        </a>
    </div>
</form>
