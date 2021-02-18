<x-app-layout>
    <section class="bg-gray-700 text-white py-12">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <figure class="">
                    @if ($course->image)
                        <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="{{ $course->title }}">
                    @else
                        <img class="h-60 w-full object-cover" src="{{ asset('img/courses/placeholder-course-image.png') }}" alt="{{ $course->title }}">
                    @endif
                </figure>
                <div>
                    <h1 class="text-4xl">{{ $course->title }}</h1>
                    <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>
                    <p class="mb-1">Nivel: {{ $course->level->name }}</p>
                    <p class="mb-1">Categoría: {{ $course->category->name }}</p>
                    <p class="mb-1">Matriculados: {{ $course->students_count }}</p>
                    <p class="mb-1">Calificación: {{ $course->rating }}</p>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            @if (session('info'))
                <div class="lg:col-span-3">
                    <div class="alert alert-red">
                        <div class="mr-2">
                            <svg class="alert-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1"><b>Ha ocurrido un error!</b> {{ session('info') }}</div>
                    </div>
                </div>
            @endif

            <div class="order-2 lg:col-span-2 lg:order-1">

                {{-- Goals --}}
                <section class="card text-gray-700 mb-6 lg:mb-12">
                    <div class="card-body">
                        <h1 class="font-bold text-xl mb-4">Lo que aprenderás</h1>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-1">
                            @forelse ($course->goals as $goal)
                                <li class="text-base">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline text-gray-300 mr-1" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg> {{ $goal->name }}
                                </li>
                            @empty
                                <li class="text-gray-400">No se han agregado metas a este curso</li>
                            @endforelse
                        </ul>
                    </div>
                </section>

                {{-- Temario --}}
                <section class="card text-gray-700 mb-6 lg:mb-12">
                    <div class="card-body">
                        <h1 class="font-bold text-xl mb-4">Temario</h1>
                        @forelse ($course->sections as $section)
                            <article class="mb-4 rounded shadow" @if($loop->first) x-data="{ open: true } @else x-data="{ open: false } @endif">
                                <header class="border border-gray-200 bg-gray-200 rounded cursor-pointer px-4 py-2" x-on:click="open = !open">
                                    <h1 class="font-bold text-gray-600">{{ $section->name }}</h1>
                                </header>
                                <div class="bg-white py-4 px-4" x-show="open">
                                    <ul class="grid grid-cols-1 gap-2">
                                        @forelse ($section->lessons as $lesson)
                                            <li class="text-gray-700 text-base">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline text-gray-300 mr-1" viewBox="0 0 16 16">
                                                    <path d="M0 12V4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm6.79-6.907A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
                                                </svg> {{ $lesson->name }}
                                            </li>
                                        @empty
                                            <li class="text-gray-400">No se han agregado lecciones a esta sección</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </article>
                        @empty
                            <p class="text-gray-400">No se han agregado secciones a este curso</p>
                        @endforelse
                    </div>
                </section>

                {{-- Requisitos --}}
                <section class="card text-gray-700 mb-6 lg:mb-12">
                    <div class="card-body">
                        <h1 class="font-bold text-xl mb-4">Requisitos</h1>
                        <ul class="list-disc list-inside">
                            @forelse ($course->requirements as $requirement)
                                <li class="text-base">{{ $requirement->name }}</li>
                            @empty
                                <p class="text-gray-400">No se han agregado requisitos a este curso</p>
                            @endforelse
                        </ul>
                    </div>
                </section>

                {{-- Descripción --}}
                <section class="card text-gray-700 mb-6 lg:mb-12">
                    <div class="card-body">
                        <h1 class="font-bold text-xl mb-4">Descripción del curso</h1>
                        @if ($course->description)
                            <p class="text-gray-700">{!! $course->description !!}</p>
                        @else
                            <p class="text-gray-400">No se han agregado descripción a este curso</p>
                        @endif
                    </div>
                </section>

            </div>
            <div class="order-1 lg:order-2">
                <section class="card text-gray-700 mb-6 lg:mb-12">
                    <div class="card-body">
                        <div class="flex items-center mb-4">
                            <figure class="flex-shrink-0 mr-4">
                                <img class="h-12 w-12 object-cover rounded-full shadow" src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                            </figure>
                            <div>
                                <h1 class="font-bold text-gray-500">Prof. {{ $course->teacher->name }}</h1>
                                <a class="text-gray-400 text-sm" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                            </div>
                        </div>

                        <form action="{{ route('admin.courses.approved', $course) }}" class="mb-2" method="POST">
                            @csrf
                            <button class="btn btn-green btn-block">
                                Aprobar curso
                                <svg class="inline h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>

                        <a href="{{ route('admin.courses.observation', $course) }}" class="btn btn-red btn-block">
                            Realizar observación
                            <svg class="inline h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                            </svg>
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
