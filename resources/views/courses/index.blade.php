<x-app-layout>

    {{-- Cover --}}
    <section class="bg-cover bg-center" style="background-image: url('{{ asset('img/courses/pexels-luis-gomes-546819.jpg') }}');">
        <div class="max-w-7xl mx-auto px-4 py-36 sm:px-6 lg:px-8 text-white">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="font-bold text-4xl">Los mejores cursos de programación ¡GRATIS! y en español.</h1>
                <p class="text-lg mt-2 mb-4">Si estás buscando potenciar tus conocimientos de programación, has llegado al lugar adecuado. Encuentra cursos y proyectos que te ayudarán en ese proceso</p>
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="search" placeholder="Search">
                    <button type="submit" class="absolute right-0 top-0 mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none">Buscar</button>
                </div>
            </div>
        </div>
    </section>

    @livewire('course-index')

</x-app-layout>
