<x-instructor-layout :course="$course">

    <h1 class="text-2xl font-bold mb-8">Información del curso</h1>

    {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => true, 'autocomplete' => 'off']) !!}

        @include('instructor.courses.partials.form')

        <div class="flex justify-end mt-12">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-blue']) !!}
        </div>

    {!! Form::close() !!}

    <x-slot name="js">

        <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/instructor/courses/form.js') }}"></script>

    </x-slot>
</x-instructor-layout>
