<x-app-layout>
    <section class="bg-gray-700 text-white py-12">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <figure class="">
                    <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="{{ $course->title }}">
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
            <div class="order-2 lg:col-span-2 lg:order-1">

                <section class="card text-gray-700 mb-6 lg:mb-12">
                    <div class="card-body">
                        <h1 class="font-bold text-xl mb-4">Lo que aprenderás</h1>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-1">
                            @foreach ($course->goals as $goal)
                                <li class="text-base">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline text-gray-300 mr-1" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg> {{ $goal->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>

                <section class="card text-gray-700 mb-6 lg:mb-12">
                    <div class="card-body">
                        <h1 class="font-bold text-xl mb-4">Temario</h1>

                        @foreach ($course->sections as $section)
                            <article class="mb-4 rounded shadow" @if($loop->first) x-data="{ open: true } @else x-data="{ open: false } @endif">
                                <header class="border border-gray-200 bg-gray-200 rounded cursor-pointer px-4 py-2" x-on:click="open = !open">
                                    <h1 class="font-bold text-gray-600">{{ $section->name }}</h1>
                                </header>
                                <div class="bg-white py-4 px-4" x-show="open">
                                    <ul class="grid grid-cols-1 gap-2">
                                        @foreach ($section->lessons as $lesson)
                                        <li class="text-gray-700 text-base">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline text-gray-300 mr-1" viewBox="0 0 16 16">
                                                <path d="M0 12V4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm6.79-6.907A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
                                            </svg> {{ $lesson->name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="card text-gray-700 mb-6 lg:mb-12">
                    <div class="card-body">
                        <h1 class="font-bold text-xl mb-4">Requisitos</h1>
                        <ul class="list-disc list-inside">
                            @foreach ($course->requirements as $requirement)
                                <li class="text-base">{{ $requirement->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </section>

                <section class="card text-gray-700 mb-6 lg:mb-12">
                    <div class="card-body">
                        <h1 class="font-bold text-xl mb-4">Descripción del curso</h1>
                        <p class="text-gray-700">{!! $course->description !!}</p>
                    </div>
                </section>

                <section class="card text-gray-700 mb-6 lg:mb-12">
                    <div class="card-body">
                        @livewire('course-review', ['course' => $course])
                    </div>
                </section>

            </div>
            <div class="order-1 lg:order-2">
                <section class="card text-gray-700 mb-6 lg:mb-12">
                    <div class="card-body">
                        <div class="flex items-center">
                            <figure class="flex-shrink-0 mr-4">
                                <img class="h-12 w-12 object-cover rounded-full shadow" src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                            </figure>
                            <div>
                                <h1 class="font-bold text-gray-500">Prof. {{ $course->teacher->name }}</h1>
                                <a class="text-gray-400 text-sm" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                            </div>
                        </div>

                        @can('enrolled', $course)
                            <a href="{{ route('courses.status', $course) }}" class="btn btn-blue btn-block mt-4">Continuar con el curso</a>
                        @else
                            @if ($course->price->value == 0)
                                <form action="{{ route('courses.enrolled', $course) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-green btn-block mt-4"><span class="uppercase">Gratis</span> - Comenzar ahora</button>
                                </form>
                            @else
                                <a href="{{ route('payment.checkout', $course) }}" class="btn btn-blue btn-block flex justify-between mt-4">US$ {{ $course->price->value }} - Comprar curso</a>
                            @endif
                        @endcan
                    </div>
                </section>

                <aside class="hidden lg:block">
                    @foreach ($alikes as $alike)
                        <article class="flex mb-6">
                            <div class="flex-shrink-0 mr-4">
                                <img class="h-24 w-32 object-cover shadow" src="{{ Storage::url($alike->image->url) }}" alt="{{ $alike->title }}">
                            </div>
                            <div>
                                <h1 class="leading-4 mb-1">
                                    <a class="font-bold text-gray-500" href="{{ route('courses.show', $alike) }}">{{ Str::limit($alike->title, 40) }}</a>
                                </h1>

                                <div class="flex items-center">
                                    <div class="flex-shrink-0 mr-1">
                                        <img class="h-6 w-6 object-cover rounded-full" src="{{ $alike->teacher->profile_photo_url }}" alt="{{ $alike->teacher->name }}">
                                    </div>
                                    <div>
                                        <h1 class="text-xs font-bold text-gray-500">Prof. {{ $alike->teacher->name }}</h1>
                                    </div>
                                </div>

                                <div class="text-sm text-gray-400 font-bold leading-4 mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="inline text-yellow-400 mr-1" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg> {{ $alike->rating }}
                                </div>
                            </div>
                        </article>
                    @endforeach
                </aside>
            </div>
        </div>
    </div>
</x-app-layout>
