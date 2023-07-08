<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Calculadora Contábil</title>
</head>

<body >
        <x-header></x-header>
        
        <main>
            @yield('content')

        </main>
        
        <x-footer></x-footer>
    <script src="./Assets/script/classes.js"></script>
    <script src="./Assets/script/net_salary.js"></script>
</body>

</html>
