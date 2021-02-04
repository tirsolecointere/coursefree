<form class="pt-2 relative mx-auto text-gray-600" autocomplete="off">
    <input wire:model="search" class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="search" placeholder="Search">
    <button type="submit" class="absolute right-0 top-0 mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none">Buscar</button>

    @if($search)
        <ul class="absolute left-0 w-full bg-white mt-1 rounded-lg shadow-xl overflow-hidden z-50">
            @forelse ($this->results as $result)
                <li class="">
                    <a href="{{ route('courses.show', $result) }}" class="block px-5 py-2 text-sm text-gray-500 cursor-pointer hover:bg-blue-100">{{ $result->title }}</a>
                </li>
            @empty
            <li class="block px-5 py-2 text-sm text-gray-500">
                No se ha encontrado ningún resultado que concida con su busqueda.
            </li>
            @endforelse
        </ul>
    @endif
</form>
