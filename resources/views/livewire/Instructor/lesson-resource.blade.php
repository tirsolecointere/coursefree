<div>
    <article class="bg-gray-100 shadow rounded mb-1" x-data="{open: false}">
        <header>
            <button @click="open = !open;" class="block w-full text-left py-2 px-3 rounded focus:ring-2 focus:ring-gray-300 focus:outline-none">Recursos de la lección</button>
        </header>
        <div class="py-2 px-3 border-t border-gray-200" x-show="open">
            @if ($lesson->resource)
                <div class="flex justify-between items-center">
                    <p class="text-sm">
                        <button wire:click="download" class="p-1 text-gray-400 rounded hover:text-blue-500 focus:text-blue-500 focus:ring-2 ring-blue-300 focus:outline-none">
                            <svg class="inline w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>{{ $lesson->resource->url }}
                    </p>

                    <button wire:click="destroy" class="p-1 text-red-500 rounded hover:text-red-600 focus:text-red-600 focus:ring-2 ring-red-300 focus:outline-none">
                        <svg class="inline w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            @else
                <form wire:submit.prevent="save" class="flex flex-col md:flex-row gap-3">
                    <div class="flex-1">
                        <input wire:model="file" name="file" type="file" class="form-input @if($errors->has('file')) invalid @endif">
                        @error('file')
                            <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-blue" wire:loading.class="opacity-50 pointer-events-none" wire:target="file">Guardar</button>
                    </div>
                </form>
            @endif
        </div>
    </article>
</div>
