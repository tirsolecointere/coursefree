<div class="container py-12">
    <x-table-responsive>

        <div class="flex items-center px-6 py-4">
            <div class="flex-shrink-0 mr-3">
                <a href="{{ route('instructor.courses.create') }}" class="btn btn-blue">Crear nuevo curso</a>
            </div>
            <input wire:model="search" wire:keydown="resetPage" type="text" class="form-input flex-1 shadow-sm" placeholder="Buscar...">
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matriculados</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Calificación</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($courses as $course)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                @isset($course->image)
                                    <img class="h-10 w-10 rounded-full" src="{{ Storage::url($course->image->url) }}">
                                    @else
                                    <img class="h-10 w-10 rounded-full" src="{{ asset('img/courses/placeholder-course-image.png') }}">
                                @endisset
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    <a class="text-indigo-600 hover:text-indigo-900" href="{{ route('instructor.courses.edit', $course) }}">{{ Str::limit($course->title, 40) }}</a>
                                </div>
                                <div class="text-sm text-gray-500">{{ $course->category->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $course->students->count() }}</div>
                        <div class="text-sm text-gray-500">Alumnos matriculados</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center text-sm text-gray-900">
                            <b class="mr-2">{{ $course->rating }}</b>
                            <ul class="flex text-sm">
                                <li class="mr-1">
                                    <svg class="text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-300" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                </li>
                                <li class="mr-1">
                                    <svg class="text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-300" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                </li>
                                <li class="mr-1">
                                    <svg class="text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-300" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                </li>
                                <li class="mr-1">
                                    <svg class="text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-300" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                </li>
                                <li class="mr-1">
                                    <svg class="text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-300" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                </li>
                            </ul>
                        </div>
                        <div class="text-sm text-gray-500">Valoración del curso</div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        @switch($course->status)
                            @case(1)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Borrador
                                </span>
                                @break
                            @case(2)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Revisión
                                </span>
                                @break
                            @case(3)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Publicado
                                </span>
                                @break
                            @default

                        @endswitch
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('instructor.courses.edit', $course) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium" colspan="5">No se encontraron registros.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-4">
            {{ $courses->links() }}
        </div>
    </x-table-responsive>

</div>
