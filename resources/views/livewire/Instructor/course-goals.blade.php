<section>
    <h1 class="text-2xl font-bold mb-8">Metas</h1>

    @foreach ($course->goals as $item)
        <article class="bg-gray-50 rounded shadow mb-4">
            @if ($goal->id == $item->id)
                <header class="flex justify-between items-center px-4 py-3">
                    <form class="flex-1" wire:submit.prevent="update">
                        <input wire:model="goal.name" type="text" class="form-input @if($errors->has('goal.name')) invalid @endif" placeholder="Escribir...">
                        @error('goal.name')
                            <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
                        @enderror
                    </form>
                </header>
            @else
                {{-- show section --}}
                <div class="flex justify-between items-center">
                    <div class="flex-1 text-left rounded px-4 py-3">
                        <h1><b>{{ $item->name }}</b></h1>
                    </div>
                    <div class="flex-shrink-0 select-none ml-4">
                        <button wire:click="edit({{ $item }})" class="p-1 text-gray-400 rounded hover:text-blue-500 focus:text-blue-500 focus:ring-2 ring-blue-300 focus:outline-none" type="button">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                        <button wire:click="destroy({{ $item }})" class="p-1 text-gray-400 rounded hover:text-red-500 focus:text-red-500 focus:ring-2 ring-red-300 focus:outline-none" type="button">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
        </article>
    @endforeach

    {{-- add new goal --}}
    <div class="mt-4" x-data="{open: false}">
        <div class="text-center mb-3">
            <button class="btn btn-green" type="button" @click="open = true; if (open) $nextTick(()=>{ $refs.nameInput.focus() });" x-show="!open">
                <svg class="inline w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg> Agregar nueva meta
            </button>
        </div>
        <article class="bg-gray-50 rounded shadow px-4 py-3 mb-3" x-show="open">
            <h1 class="text-lg font-bold mb-3">Nueva meta</h1>
            <form wire:submit.prevent="store" class="flex flex-wrap gap-2 mb-3">
                <div class="flex-1">
                    <input wire:model="name" x-ref="nameInput" type="text" class="form-input @if($errors->has('name')) invalid @endif" placeholder="Nombre de la meta">
                    @error('name')
                        <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
                    @enderror
                </div>
                <div>
                    <div class="flex gap-2">
                        <button class="btn" @click="open = false" wire:click="cancel" type="button">Cancelar</button>
                        <button class="btn btn-blue" type="submit">Guardar</button>
                    </div>
                </div>
            </form>
        </article>
    </div>
</section>
