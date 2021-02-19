<div>
    <section class="container py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="embed-responsive mb-5">
                    {!! $current->iframe !!}
                </div>
                <h1 class="text-2xl text-gray-700 font-bold mb-3">{{ $current->name }}</h1>
                @if($current->description)
                    <p class="text-gray-500">{{ $current->description->name }}</p>
                @endif

                <div class="flex justify-between mt-4">
                    <div class="cursor-pointer" wire:click="completed">
                        @if ($current->completed)
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="inline text-green-500" viewBox="0 0 16 16">
                            <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="inline text-gray-500" viewBox="0 0 16 16">
                            <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"/>
                        </svg>
                        @endif
                        Marcar unidad como culminada
                    </div>
                    @if ($current->resource)
                        <button class="btn" wire:click="download">
                            <svg class="inline h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd" />
                            </svg> Descargar recurso
                        </button>
                    @endif
                </div>

                <div class="flex justify-between items-center mt-5">
                    <div>
                        @if ($this->previous)
                            <button wire:click="changeLesson({{ $this->previous }})" class="block bg-white shadow h-12 px-4 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 mr-2 lg:mr-4 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline text-xs text-gray-400 mr-1" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                </svg>
                                Anterior
                            </button>
                        @endif
                    </div>
                    <div>
                        @if ($this->next)
                            <button wire:click="changeLesson({{ $this->next }})" class="block bg-white shadow h-12 px-4 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 mr-2 lg:mr-4 mb-2">
                                Siguiente
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" inline text-xs text-gray-400 ml-1" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h1 class="text-lg text-gray-700 font-bold">{{ $course->title }}</h1>

                        <div class="flex items-center py-5">
                            <figure class="flex-shrink-0 mr-4">
                                <img class="h-12 w-12 object-cover rounded-full shadow" src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                            </figure>
                            <div>
                                <h1 class="font-bold text-gray-500">Prof. {{ $course->teacher->name }}</h1>
                                <a class="text-gray-400 text-sm" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                            </div>
                        </div>

                        <p class="text-gray-500 text-sm">{{ $this->advance . '%'}} completado</p>
                        <div class="relative pt-1">
                            <div class="flex bg-gray-100 overflow-hidden h-2 text-xs rounded mb-5">
                                <div style="width: {{ $this->advance . '%'}}" class="flex flex-col bg-blue-500 shadow-none text-center whitespace-nowrap text-white justify-center transition-all duration-500"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <ul>
                            @foreach ($course->sections as $section)
                                <li class="mb-5">
                                    <div class="font-bold mb-2">{{ $section->name }}</div>
                                    <ul>
                                        @foreach ($section->lessons as $lesson)
                                            <li class="flex text-sm mb-2">
                                                @if ($lesson->completed)
                                                    @if ($current->id == $lesson->id)
                                                        <span class="inline-block flex-shrink-0 w-3 h-3 border-2 border-green-500 rounded-full mr-2 mt-1"></span>
                                                        @else
                                                        <span class="inline-block flex-shrink-0 w-3 h-3 bg-green-500 rounded-full mr-2 mt-1"></span>
                                                    @endif
                                                @else
                                                    @if ($current->id == $lesson->id)
                                                        <span class="inline-block flex-shrink-0 w-3 h-3 border-2 border-gray-500 bg-gray-50 rounded-full mr-2 mt-1"></span>
                                                    @else
                                                        <span class="inline-block flex-shrink-0 w-3 h-3 bg-gray-300 rounded-full mr-2 mt-1"></span>
                                                    @endif
                                                    {{-- <span class="inline-block w-3 h-3 bg-gray-300 rounded-full mr-2 mt-1"></span> --}}
                                                @endif
                                                <a class="block flex-grow px-2 rounded hover:bg-gray-100" href="javascript:void(0)" wire:click="changeLesson({{ $lesson }})">
                                                    {{ $lesson->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
