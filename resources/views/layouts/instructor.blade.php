<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <div class="container py-12 grid grid-cols-5 gap-8">
                <aside>
                    <ul>
                        <li>
                            <a class="block px-4 py-2 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) text-blue-700 bg-blue-100 hover:bg-blue-200 border-blue-400 @else text-gray-600 hover:bg-gray-200 border-transparent @endif" href="{{ route('instructor.courses.edit', $course) }}">Informacion</a>
                        </li>
                        <li>
                            <a class="block px-4 py-2 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) text-blue-700 bg-blue-100 hover:bg-blue-200 border-blue-400 @else text-gray-600 hover:bg-gray-200 border-transparent @endif" href="{{ route('instructor.courses.curriculum', $course) }}">Lecciones</a>
                        </li>
                        <li>
                            {{-- <a class="block px-4 py-2 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) text-blue-700 bg-blue-100 hover:bg-blue-200 border-blue-400 @else text-gray-600 hover:bg-gray-200 border-transparent @endif" href="">Metas</a> --}}
                        </li>
                        <li>
                            {{-- <a class="block px-4 py-2 mb-1 border-l-4 @routeIs('instructor.courses.students', $course) text-blue-700 bg-blue-100 hover:bg-blue-200 border-blue-400 @else text-gray-600 hover:bg-gray-200 border-transparent @endif" href="">Estudiantes</a> --}}
                        </li>
                    </ul>
                </aside>

                <main class="col-span-4">
                    <div class="card text-gray-600">
                        <div class="card-body">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
            {{ $js }}
        @endisset
    </body>
</html>
