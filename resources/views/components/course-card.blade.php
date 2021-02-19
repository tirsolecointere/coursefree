@props(['course'])

<article class="card flex flex-col">
    <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
    <div class="card-body flex-1 flex flex-col justify-between">
        <div>
            <h1 class="card-title">{{ Str::limit($course->title, 40) }}</h1>
            <p class="text-gray-500 text-sm mb-2">Prof: {{ $course->teacher->name }}</p>
        </div>
        <div>
            <div class="flex">
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
                <p class="text-sm text-gray-500 ml-auto">({{ $course->students_count }})</p>
            </div>

                @if ($course->price->value == 0)
                    <p class="font-bold uppercase text-green-500 my-3">Gratis</p>
                @else
                    <p class="font-bold uppercase my-3">US$ {{ $course->price->value }}</p>
                @endif

            <a class="btn btn-blue btn-block" href="{{ route('courses.show', $course) }}">Más información</a>
        </div>
    </div>
</article>
