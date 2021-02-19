<x-app-layout>
    <article class="max-w-4xl mx-auto px-4 lg:px-8 py-12">
        <div class="card">
            <header class="card-body flex items-center flex-wrap">
                <figure class="mr-4">
                    <img class="h-12 w-12 rounded object-cover" src="{{ Storage::url($course->image->url) }}" alt="{{ $course->title }}">
                </figure>
                <div class="flex-1 leading-tight">
                    <h1 class="text-xl font-bold">{{ $course->title }}</h1>
                    <div class="text-sm text-gray-400">de {{ $course->teacher->name }}</div>
                </div>
                <div class="w-full sm:w-auto mt-4 sm:mt-0">
                    <span class="text-2xl font-bold">US$ {{ $course->price->value }}</span>
                </div>
            </header>
            <footer class="card-body flex justify-center md:justify-end border-t">
                <a href="" class="btn btn-blue">
                    Comprar éste curso
                    <svg class="inline w-4 h-4 ml-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </footer>
            <div class="card-body border-t">
                <p class="text-xs text-gray-400 leading-tight">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum saepe cumque ut, soluta illo mollitia, nesciunt a modi molestias alias quos iure tempora aliquam animi temporibus magnam possimus minus accusantium! <a href="" class="text-blue-400">Términos y condiciones</a></p>
            </div>
        </div>
    </article>
</x-app-layout>
