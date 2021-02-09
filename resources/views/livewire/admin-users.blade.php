<div>
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <div class="flex-nowrap mr-3">
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Crear usuario</a>
            </div>
            <div class="flex-grow-1 position-relative">
                <input wire:model="search" wire:keydown="resetPage" type="text" class="form-control" placeholder="Buscar...">
                <div class="position-absolute" wire:loading.delay style="right: .5rem; top: .25rem;">
                    <div class="spinner-border spinner-border-sm text-muted" role="status">
                        <span class="sr-only">Cargando...</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
              <table class="table table-striped">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td scope="row">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td width="1rem">
                            <a class="btn btn-secondary btn-sm" href="{{ route('admin.users.edit', $user) }}">Editar</a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4">No se encontraron registros.</td>
                        </tr>
                    @endforelse
                </tbody>
              </table>
        </div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>
</div>
