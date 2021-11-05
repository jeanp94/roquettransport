@extends('layouts.app')

@section('styles')
<style>

</style>
@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Artículos</li>
        </ol>
    </nav>

    <h1>POSTS</h1>
    <div class="text-right mb-4">
        <a href="{{ route('posts.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> NUEVO ARTÍCULO</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Creado</th>
                    <th class="text-center">Actualizado</th>
                    <th class="text-center">Fecha pub.</th>
                    <th>Título</th>
                    <th class="text-center">Categoría</th>
                    <th class="text-center">Vistas</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr>

                    <td><span
                            class="badge {{ $post->status == 1 ? 'badge-success' : 'badge-warning' }}">{{ $post->status == 1 ? 'Publicado' : 'Borrador' }}</span>
                    </td>
                    <td class="text-center" title="{{ $post->created_at->isoFormat('DD MMMM YYYY h:mm a') }}">
                        {{ $post->created_at->diffForHumans() }}</td>
                    <td class="text-center" title="{{ $post->updated_at->isoFormat('DD MMMM YYYY h:mm a') }}">
                        {{ $post->updated_at->diffForHumans() }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($post->published_at)->isoFormat('DD MMMM, YYYY') }}
                    </td>
                    <td><a target="_blank" title="Ver" href="{{ route('posts.read', $post->slug) }}">{{ $post->title }}
                            <i class="fa fa-external-link"></i></a></td>
                    <td class="text-center">{{ $post->category->name }}</td>
                    <td class="text-center">{{ $post->views }}</td>

                    <td class="text-center">
                        <div class="d-flex">
                            <form method="POST" action="{{ route('posts.change_status', $post->id) }}">
                                {{ csrf_field() }}
                                <button type="submit"
                                    class="btn-sm btn mr-2 {{ $post->status == 2 ? 'btn-success' : 'btn-warning' }} "
                                    title="{{ $post->status == 2 ? 'Publicar' : 'Cambiar a borrador' }}"><i
                                        class="fa {{ $post->status == 2 ? 'fa-check' : 'fa-eraser' }}"></i></button>
                            </form>

                            <a href="{{ route('posts.edit', $post->id) }}" title="Editar"
                                class="btn-sm btn mr-2 btn-primary"><i class="fa fa-pencil"></i></a>

                            <button type="button" class="btn-sm btn btn-danger action-trytodelete"
                                data-action="{{ route('posts.destroy', $post->id) }}" data-toggle="modal"
                                data-target="#deletemodal" title="Eliminar"><i class="fa fa-trash"></i></button>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8"><em>No hay artículos aún</em></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar artículo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Seguro que desea eliminar el artículo?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form method="post" action="">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(".action-trytodelete").click(function(){
        $("#deletemodal form").attr('action',$(this).data('action'))
    })
</script>
@endsection
