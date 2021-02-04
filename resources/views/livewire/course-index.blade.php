<div>
    <div class="bg-gray-200 py-4">
        <div class="container flex flex-wrap">
            <button class="block bg-white shadow h-12 px-4 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 mr-2 lg:mr-4 mb-2" wire:click="resetFilters">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-stack inline text-xs text-gray-400 mr-1" viewBox="0 0 16 16">
                    <path d="M14.12 10.163l1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z"/>
                    <path d="M14.12 6.576l1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z"/>
                </svg>
                Todos los cursos
            </button>

            <!-- Dropdown categories -->
            <div class="relative mb-2" x-data="{ open: false }">
                <button class="block bg-white shadow h-12 px-4 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 mr-2 lg:mr-4" x-on:click="open = !open">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags-fill inline text-xs text-gray-400 mr-1" viewBox="0 0 16 16">
                        <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                        <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z"/>
                    </svg>
                    Categoría
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down inline text-xs text-gray-300 ml-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-50 mt-2 bg-white border rounded shadow-xl p-2" x-show="open" x-on:click.away="open = false">
                    @foreach ($categories as $category)
                        <a href="javascript:void(0)" class="transition-colors duration-200 block px-4 py-1 text-normal text-gray-700 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('category_id', {{ $category->id }})" x-on:click="open = false">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>

            <!-- Dropdown levels -->
            <div class="relative mb-2" x-data="{ open: false }">
                <button class="block bg-white shadow h-12 px-4 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 mr-2 lg:mr-4" x-on:click="open = !open">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hdd-stack inline text-xs text-gray-400 mr-1" viewBox="0 0 16 16">
                        <path d="M14 10a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1h12zM2 9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2z"/>
                        <path d="M5 11.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM14 3a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                        <path d="M5 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                    </svg>
                    Niveles
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down inline text-xs text-gray-300 ml-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-50 mt-2 bg-white border rounded shadow-xl p-2" x-show="open" x-on:click.away="open = false">
                    @foreach ($levels as $level)
                        <a href="javascript:void(0)" class="transition-colors duration-200 block px-4 py-1 text-normal text-gray-700 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('level_id', {{ $level->id }})" x-on:click="open = false">{{ $level->name }}</a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <div class="container py-16">
        <p wire:loading class="mb-5">Buscando...</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8">
            @forelse ($courses as $course)
                <x-course-card :course="$course" />
            @empty
                <p class="block text-gray-400 sm:col-span-2 lg:col-span-4">No se han encontrado resultados que coincidan con su filtro de busqueda.</p>
            @endforelse
        </div>

        <div class="mt-5">
            {{ $courses->links() }}
        </div>
    </div>
</div>
