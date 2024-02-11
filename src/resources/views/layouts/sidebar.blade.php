@use('Illuminate\Support\Str')
<div class="h-screen">
    <div class="wrapper w-60 bg-indigo-900/40 h-full flex">
        <div class="sidebar flex flex-col  items-center w-full justify-start" data-color="brown"
             data-active-color="danger">
            @if(env('MEMORY_VEHICLE_MODULE'))
                <a href="{{ route('memory.vehicles.index') }}"
                   class="bg-indigo-900/60 p-2 text-indigo-100 flex flex-row h-16 w-32 items-center justify-between space-x-4
                space-x-5 w-full hover:bg-indigo-600 transition duration-300 ease-in-out {{ Str::startsWith(Route::currentRouteName(), 'memory.vehicles.') ? 'font-bold' : '' }}">
                    <div>
                        <i class="fas fa-car  fa-fw"></i>
                        <span>
                        Vehicles
                    </span>
                    </div>
                </a>
            @endif
        </div>
    </div>
</div>
