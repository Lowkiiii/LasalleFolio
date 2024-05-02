<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="text-black">
<main>
    
    <div class="border-b-2 px-10 flex flex-row items-center justify-between bg-[#313f6a]"> 
        <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <button type="submit" class="text-lg font-semibold leading-6 bg-red-500 text-white px-4 py-2 rounded-lg flex items-center justify-center space-x-2 hover:bg-red-600">
                        <span class="mr-2">Logout</span>
                        <i class="fas fa-chevron-right"></i>
                    </button>
        </form>
    </div>
    
</main>
</body>
</html>
