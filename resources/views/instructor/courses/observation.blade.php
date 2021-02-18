<x-instructor-layout :course="$course">
    <h1 class="text-2xl font-bold mb-8">Observaciones del curso</h1>

    <div>
        {!! $course->observation->body !!}
    </div>
</x-instructor-layout>
