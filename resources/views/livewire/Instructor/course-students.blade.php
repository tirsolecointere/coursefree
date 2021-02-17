<div>
    <h1 class="text-2xl font-bold mb-8">Estudiantes matriculados</h1>

    <x-table-responsive>

        <div class="px-6 py-4">
            <input wire:model="search" type="text" class="form-input flex-1 shadow-sm" placeholder="Buscar...">
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($students as $student)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-8 w-8 rounded-full" src="{{ $student->profile_photo_url }}">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm text-gray-500">{{ $student->name}}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $student->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium" colspan="3">No hay ningun estudiante matriculado a este curso.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-4">
            {{ $students->links() }}
        </div>
    </x-table-responsive>
</div>
