<x-app-layout>

    {{-- Cover --}}
    <section class="bg-cover bg-center" style="background-image: url('{{ asset('img/home/pexels-andrew-neel-3954635.jpg') }}');">
        <div class="max-w-7xl mx-auto px-4 py-36 sm:px-6 lg:px-8 text-white">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="font-bold text-4xl">Domina la tecnología web con Course Free</h1>
                <p class="text-lg mt-2 mb-4">En Course Free encontrarás cursos, manuales y artículos que te ayudarán a convertirte en un profesional del desarrollador web</p>

                @livewire('search')

            </div>
        </div>
    </section>

    <section class="py-12">
        <h1 class="text-gray-600 text-center text-3xl mb-6">Contenido</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/pexels-christina-morillo-1181352.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y productos</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto saepe corrupti maxime!</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/pexels-vlada-karpovich-4050299.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Manual de Laravel</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto saepe corrupti maxime!</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/pexels-andrew-neel-3954635.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Blog</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto saepe corrupti maxime!</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/pexels-vlada-karpovich-4050299.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Desarrollo web</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto saepe corrupti maxime!</p>
            </article>
        </div>
    </section>

    <section class="py-12 bg-gray-700 text-center text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl mb-3">¿No sabes qué curso llevar?</h1>
            <p class="mb-5">Dirígete al catálogo de cursos y filtralos por categoría o nivel</p>
            <a href="{{ route('courses.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none">Catálogo de cursos</a>
        </div>
    </section>

    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-center text-gray-600 text-3xl mb-5">Ultimos cursos</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8">
                @foreach ($courses as $course)
                    <x-course-card :course="$course" />
                @endforeach
            </div>
        </div>
    </section>

</x-app-layout>
