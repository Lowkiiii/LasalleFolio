<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="text-white bg-white">
        <div class="bg-white px-52 flex flex-row items-center py-7 justify-between">
        <div class="flex flex-row items-center">
                <img src='/image/mtlogo.png' class="size-20 mr-24" />
                <div class="flex flex-row">
                    <a href="/studentdashboard" class="text-xl px-5 py-2 rounded-full mr-5 bg-[#28797c]">Home</a>
                    </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <button type="submit" class="text-lg font-semibold leading-6 bg-red-500 text-white px-4 py-2 rounded-lg flex items-center justify-center space-x-2 hover:bg-red-600">
                        <span class="mr-2">Logout</span>
                        <i class="fas fa-chevron-right"></i>
                    </button>
            </form>
        </div>
        <div class="container">
            {{-- <h1>{{ $user->first_name }} {{ $user->last_name }}</h1> --}}
        </div>
</body>

</html>

       
