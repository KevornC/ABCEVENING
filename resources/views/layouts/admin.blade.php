<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Evening</title>
    <meta name="description" content="">
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
    @livewireStyles
</head>
<body class="flex h-screen font-sans antialiased leading-none bg-gray-100 font-family-karla">

    <aside class="relative hidden w-64 h-screen shadow-xl bg-sidebar sm:block">
        <div class="p-6">
            <a href="/home" class="text-3xl font-semibold text-white uppercase hover:text-gray-300">Admin</a>
            {{-- <button class="flex items-center justify-center w-full py-2 mt-5 font-semibold bg-white rounded-tr-lg rounded-bl-lg rounded-br-lg shadow-lg cta-btn hover:shadow-xl hover:bg-gray-300">
                <i class="mr-3 fas fa-plus"></i> New Report
            </button> --}}
        </div>
        <nav class="pt-3 text-base font-semibold text-white">
            <a href="/home" class="flex items-center py-4 pl-6 text-white active-nav-link nav-item">
                <i class="mr-3 fas fa-tachometer-alt"></i>
                Dashboard
            </a>
            <a href="{{route('teacher')}}" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                {{-- <i class="mr-3 fas fa-sticky-note"></i> --}}
                <i class="mr-3 fas fa-align-left"></i>
                Teachers
            </a>
            <a href="{{route('course')}}" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                <i class="mr-3 fas fa-table"></i>
                Courses
            </a>
            {{-- <a href="forms.html" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                <i class="mr-3 fas fa-align-left"></i>
                Forms
            </a> --}}
            <a href="{{route('students')}}" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                <i class="mr-3 fas fa-tablet-alt"></i>
                Students
            </a>
            <a href="{{route('schedule')}}" class="flex items-center py-4 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                <i class="mr-3 fas fa-calendar"></i>
                Class Schedule
            </a>
        </nav>
        {{-- <a href="#" class=" active-nav-link">
            <i class="mr-3 fas fa-arrow-circle-up"></i>
            Upgrade to Pro!
        </a> --}}
        <a href="{{ route('logout') }}"
        class="absolute bottom-0 flex items-center justify-center w-full py-4 text-white no-underline upgrade-btn hover:underline"
        onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
         {{ csrf_field() }}
     </form>
    </aside>

    <div class="flex flex-col w-full h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="items-center hidden w-full px-6 py-2 bg-white sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative flex justify-end w-1/2">
                <span  @click="isOpen = !isOpen" class="cursor-pointer">{{ Auth::user()->name }}</span>
                {{-- <button class="z-10 w-12 h-12 overflow-hidden border-4 border-gray-400 rounded-full realtive hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    {{-- <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">

                </button> --}}
                <button x-show="isOpen" @click="isOpen = false" class="fixed inset-0 w-full h-full cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 py-2 mt-16 bg-white rounded-lg shadow-lg">
                    <a href="{{ route('logout') }}"
                       class="block px-4 py-2 no-underline hover:underline"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </header>

    
        <div class="flex flex-col w-full overflow-x-hidden border-t">
            <main class="flex-grow w-full p-6">
                @yield('content')
                @livewireScripts
            </main>
    
            <footer class="absolute bottom-0 flex items-center justify-center w-full py-4 text-right text-black bg-white">
                Built by Kevorn Callum.
            </footer>
        </div>
        
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <script>
        var chartOne = document.getElementById('chartOne');
        var myChart = new Chart(chartOne, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var chartTwo = document.getElementById('chartTwo');
        var myLineChart = new Chart(chartTwo, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>