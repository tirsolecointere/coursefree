<div class="px-4 py-3">
    @forelse ($section->lessons as $item)
        <article class="bg-white shadow rounded mb-1" x-data="{open: false}">
            @if ($lesson->id == $item->id)
                <form wire:submit.prevent="update" class="py-2 px-3">
                    <div class="grid grid-col-1 md:grid-cols-6 items-center md:gap-3 mb-2">
                        <label for="edit-lesson-name-{{ $section->id }}">Nombre</label>
                        <div class="md:col-span-5">
                            <input wire:model="lesson.name" id="edit-lesson-name-{{ $section->id }}" type="text" class="form-input @if($errors->has('lesson.name')) invalid @endif">
                            @error('lesson.name')
                                <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-col-1 md:grid-cols-6 items-center md:gap-3 mb-2">
                        <label for="edit-lesson-platform-{{ $section->id }}">Plataforma</label>
                        <div class="md:col-span-5">
                            <select wire:model="lesson.platform_id" id="edit-lesson-platform-{{ $section->id }}" type="text" class="form-input @if($errors->has('lesson.platform')) invalid @endif">
                                @foreach ($platforms as $platform)
                                    <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                @endforeach
                            </select>
                            @error('lesson.platform')
                                <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-col-1 md:grid-cols-6 items-center md:gap-3 mb-2">
                        <label for="edit-lesson-url-{{ $section->id }}">URL</label>
                        <div class="md:col-span-5">
                            <input wire:model="lesson.url" id="edit-lesson-url-{{ $section->id }}" type="text" class="form-input @if($errors->has('lesson.url')) invalid @endif">
                            @error('lesson.url')
                                <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button wire:click="cancel" type="button" class="btn">Cancelar</button>
                        <button type="submit" class="btn btn-blue">Actualizar</button>
                    </div>
                </form>
            @else
                <header>
                    <button @click="open = !open" class="flex justify-between items-center w-full text-left py-2 px-3 rounded focus:ring-2 focus:ring-gray-300 focus:outline-none">
                        <div>
                            <svg class="inline w-5 h-5 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $item->name }}
                        </div>
                        <svg class="inline h-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </header>
                <div class="py-2 px-3 border-t border-gray-100" x-show="open">
                    <ul>
                        <li><b>Plataforma:</b> {{ $item->platform->name }}</li>
                        <li><b>Enlace:</b> <a href="{{ $item->url }}" class="text-gray-400 underline" target="_blank">{{ $item->url }}</a></li>
                    </ul>
                    <div class="my-2">
                        <button wire:click="edit({{ $item }})" class="btn btn-blue" type="button">Editar</button>
                        <button wire:click="destroy({{ $item }})" class="btn btn-red" type="button">Eliminar</button>
                    </div>

                    <div class="mb-3">
                        @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description' . $item->id))
                    </div>
                    <div class="mb-3">
                        @livewire('instructor.lesson-resource', ['lesson' => $item], key('lesson-resource' . $item->id))
                    </div>
                </div>
            @endif

        </article>
    @empty
        <div class="text-center">
            Aun no hay lecciones en esta sección
        </div>
    @endforelse

    {{-- add new lesson --}}
    <div class="mt-4" x-data="{open: false}">
        <div class="text-center mb-3">
            <button class="btn" type="button" @click="open = true; if (open) $nextTick(()=>{ $refs.lessonName.focus() });" x-show="!open">
                <svg class="inline w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg> Agregar nueva lección
            </button>
        </div>
        <article class="bg-white rounded shadow px-4 py-3 mb-3" x-show="open">
            <h1 class="text-lg font-bold mb-3">Nueva lección</h1>
            <div class="grid grid-col-1 md:grid-cols-6 items-center md:gap-3 mb-2">
                <label for="name-{{ $section->id }}">Nombre</label>
                <div class="md:col-span-5">
                    <input wire:model="name" id="name-{{ $section->id }}" x-ref="lessonName" type="text" class="form-input @if($errors->has('name')) invalid @endif">
                    @error('name')
                        <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
                    @enderror
                </div>
            </div>
            <div class="grid grid-col-1 md:grid-cols-6 items-center md:gap-3 mb-2">
                <label for="platform-{{ $section->id }}">Plataforma</label>
                <div class="md:col-span-5">
                    <select wire:model="platform_id" id="platform-{{ $section->id }}" type="text" class="form-input @if($errors->has('platform_id')) invalid @endif">
                        @foreach ($platforms as $platform)
                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                        @endforeach
                    </select>
                    @error('platform_id')
                        <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
                    @enderror
                </div>
            </div>
            <div class="grid grid-col-1 md:grid-cols-6 items-center md:gap-3 mb-2">
                <label for="url-{{ $section->id }}">URL</label>
                <div class="md:col-span-5">
                    <input wire:model="url" id="url-{{ $section->id }}" type="text" class="form-input @if($errors->has('url')) invalid @endif">
                    @error('url')
                        <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
                    @enderror
                </div>
            </div>
            <div class="flex justify-end gap-2">
                <button wire:click="cancel" @click="open = false" type="button" class="btn">Cancelar</button>
                <button wire:click="store" class="btn btn-blue">Crear</button>
            </div>
        </article>
    </div>
</div>
