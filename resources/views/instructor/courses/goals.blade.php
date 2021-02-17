<x-instructor-layout>
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>

    <div class="mb-8">
        @livewire('instructor.course-goals', ['course' => $course], key('course-goals' . $course->id))
    </div>
    <div class="mb-8">
        @livewire('instructor.course-requirements', ['course' => $course], key('course-requirements' . $course->id))
    </div>
    <div>
        @livewire('instructor.course-audiences', ['course' => $course], key('course-audiences' . $course->id))
    </div>
</x-instructor-layout>
