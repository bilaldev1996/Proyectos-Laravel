<div>
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{ session('info') }}</strong>
            </div>
        @endif
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de un post">
            
            <div class="absolute inline-block text-center right-5 top-20">
                <select class="shadow rounded-md bg-white border border-gray-400 py-2 px-4 pr-8 leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition duration-150 ease-in-out" wire:model="status">
                    <option value="published">Publicados</option>
                    <option value="draft">Borradores</option>
                    <option value="">Todos</option>
                </select>
                
            </div>
            
        </div>
        @if ($posts->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->name }}</td>
                                <td width="10px">
                                    <a class="btn btn-secondary btn-sm" href="{{ route('admin.posts.show', $post) }}">Ver</a>
                                </td>
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.edit', $post) }}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $posts->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ning??n registro...</strong>
            </div>
        @endif
    </div>
</div>
