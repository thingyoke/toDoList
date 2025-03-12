<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
