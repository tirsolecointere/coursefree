<x-app-layout>
    <div class="container py-12">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold mb-8">Nuevo curso</h1>

                {!! Form::open(['route' => 'instructor.courses.store', 'files' => true, 'autocomplete' => 'off']) !!}

                    {!! Form::hidden('user_id', auth()->user()->id) !!}

                    @include('instructor.courses.partials.form')

                    <div class="flex justify-end mt-12">
                        {!! Form::submit('Crear curso', ['class' => 'btn btn-blue']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <x-slot name="js">

        <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/instructor/courses/form.js') }}"></script>

    </x-slot>
</x-app-layout>
