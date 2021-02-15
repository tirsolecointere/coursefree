<div>
    <article class="bg-gray-100 shadow rounded mb-1" x-data="{open: false}">
        <header>
            <button @click="open = !open; if (open) $nextTick(()=>{ $refs.descTextarea.focus() });" class="block w-full text-left py-2 px-3 rounded focus:ring-2 focus:ring-gray-300 focus:outline-none">Descripción de la lección</button>
        </header>
        <div class="py-2 px-3 border-t border-gray-200" x-show="open">
            @if ($lesson->description)
                <form wire:submit.prevent="update" class="flex flex-col md:flex-row md:gap-3">
                    <div class="flex-1">
                        <textarea wire:model="description.name" x-ref="descTextarea" name="description" id="description-{{ $lesson->id }}" spellcheck="false" rows="3" class="form-input @if($errors->has('description.name')) invalid @endif"></textarea>
                    </div>

                    <div class="flex md:flex-col gap-2">
                        <button wire:click="destroy" class="btn btn-red" type="button">Eliminar</button>
                        <button class="btn btn-blue" type="submit">Actualizar</button>
                    </div>
                </form>
                @error('description.name')
                    <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
                @enderror
            @else
                <div wire:submit.prevent="update" class="flex gap-3">
                    <div class="flex-1">
                        <textarea wire:model="name" name="description" id="description-{{ $lesson->id }}" spellcheck="false" rows="3" class="form-input @if($errors->has('description.name')) invalid @endif" placeholder="Escriba una descripción para ésta lección..."></textarea>
                    </div>

                    <div class="flex flex-col gap-2">
                        <button wire:click="store" class="btn btn-blue" type="button">Guardar</button>
                    </div>
                </div>
                @error('name')
                    <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
                @enderror
            @endif
        </div>
    </article>
</div>
