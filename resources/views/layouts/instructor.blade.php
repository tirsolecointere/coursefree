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
            <div class="container py-12 grid md:grid-cols-5 md:gap-8">
                <aside>
                    <ul class="mb-8">
                        <li>
                            <a class="block px-4 py-2 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) text-blue-700 bg-blue-100 hover:bg-blue-200 border-blue-400 @else text-gray-600 hover:bg-gray-200 border-transparent @endif" href="{{ route('instructor.courses.edit', $course) }}">Informacion</a>
                        </li>
                        <li>
                            <a class="block px-4 py-2 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) text-blue-700 bg-blue-100 hover:bg-blue-200 border-blue-400 @else text-gray-600 hover:bg-gray-200 border-transparent @endif" href="{{ route('instructor.courses.curriculum', $course) }}">Lecciones</a>
                        </li>
                        <li>
                            <a class="block px-4 py-2 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) text-blue-700 bg-blue-100 hover:bg-blue-200 border-blue-400 @else text-gray-600 hover:bg-gray-200 border-transparent @endif" href="{{ route('instructor.courses.goals', $course) }}">Metas</a>
                        </li>
                        <li>
                            <a class="block px-4 py-2 mb-1 border-l-4 @routeIs('instructor.courses.students', $course) text-blue-700 bg-blue-100 hover:bg-blue-200 border-blue-400 @else text-gray-600 hover:bg-gray-200 border-transparent @endif" href="{{ route('instructor.courses.students', $course) }}">Estudiantes</a>
                        </li>

                        @if ($course->observation)
                            <li>
                                <a class="block px-4 py-2 mb-1 border-l-4 @routeIs('instructor.courses.observation', $course) text-blue-700 bg-blue-100 hover:bg-blue-200 border-blue-400 @else text-gray-600 hover:bg-gray-200 border-transparent @endif" href="{{ route('instructor.courses.observation', $course) }}">Observaciones</a>
                            </li>
                        @endif
                    </ul>

                    @switch($course->status)
                        @case(1)
                            <form action="{{ route('instructor.courses.status', $course) }}" method="POST">
                                @csrf
                                <button class="btn btn-green w-full" type="submit">Solicitar aprobación</button>
                            </form>
                            @break
                        @case(2)
                            <div class="alert alert-yellow text-sm">
                                <div class="mr-2">
                                    <svg class="alert-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1">Este curso se encuentra en revisión</div>
                            </div>
                            @break
                        @case(3)
                            <div class="alert alert-green text-sm">
                                <div class="mr-2">
                                    <svg class="alert-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1">Este curso se encuentra publicado</div>
                            </div>
                            @break
                        @default

                    @endswitch

                </aside>

                <main class="md:col-span-4">
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
