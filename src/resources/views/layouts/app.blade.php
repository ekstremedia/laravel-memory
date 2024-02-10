{{-- resources/views/layouts/app.blade.php --}}
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Memory</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        html, body {
            height: 100%;
        }
    </style>

</head>
<body class="bg-indigo-100">
@include('memoryapp::layouts.navbar')
<div class="flex">
    <div>
        @include('memoryapp::layouts.sidebar')
    </div>
    <div class="container mx-auto px-4">
        @yield('content')
    </div>
</div>
</body>
</html>
