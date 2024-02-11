{{-- resources/views/layout/sidebar.blade.php --}}

<div x-cloak :class="{'translate-x-0': sidebar_open, '-translate-x-full': !sidebar_open}" class="wrapper absolute z-50 w-full sm:w-60 bg-indigo-900/90 h-full transform transition-transform duration-300 sm:relative sm:translate-x-0 sm:block">
    <div class="sidebar flex flex-col items-center w-full justify-start">
        @include('memoryapp::main.partials.modules')
    </div>
</div>

