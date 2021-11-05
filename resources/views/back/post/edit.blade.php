@extends('layouts.app')

@section('styles')
<!-- Theme included stylesheets -->
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

<style>
    .file_chooser {
        border: 1px solid #cccccc;
        background-color: white;
        transition: all 0.3s ease;
        cursor: pointer;
        background-size: contain;
        background-position: center center;
        background-repeat: no-repeat;
    }

    .file_chooser.banner {
        padding-bottom: 20%;
    }
    .file_chooser.preview {
        padding-bottom: 50%;
    }

    .file_chooser:hover {
        background-color: #eeeeee;
    }

    .thumbnail {
        cursor: pointer;
        padding-bottom: 56.25%;
        display: block;
        background-position: center center;
        background-size: contain;
        background-repeat: no-repeat;
        background-color: white;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
        margin-bottom: 30px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('posts.index') }}">Artículos</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Editar artículo</li>
        </ol>
    </nav>

    <h1 class="mb-3">EDITAR POST</h1>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <form id="msform" class="mb-5" method="post" action="{{ route('posts.update', $post->id) }}">
                {{ csrf_field() }}
                @method('PUT')

                <div class="form-group row">
                    <label class="col-form-label col-md-3">Fecha de publicación (*)</label>
                    <div class="col-md-9">
                        <input type="date" name="published_at" class="form-control" value="{{ old('published_at') ?: $post->published_at }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-md-3">Categoría (*)</label>
                    <div class="col-md-9">
                        <select class="form-control" name="category">
                            <option value="">Seleccione</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-md-3">Título (*)</label>
                    <div class="col-md-9">
                        <input type="text" value="{{ old('title') ?: $post->title }}" maxlength="65000" autocomplete="off" name="title"
                            class="form-control" placeholder="Título">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-md-3">URL (*)</label>
                    <div class="col-md-9">
                        <div class="input-group" id="urlwraper">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{ url('/').'/' }}</span>
                            </div>
                            <input autocomplete="off" type="text" value="{{ old('slug')?: $post->slug }}" name="slug"
                                class="form-control" placeholder="URL">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-md-3">Banner</label>
                    <div class="col-md-9">
                        <div class="file_chooser banner" data-type="banner" title="Haz clic para agregar una imagen"
                            style="background-image: url('{{ asset( old('banner') ? \App\Image::find(old('banner'))->get_route() : ( $post->banner_id ? \App\Image::find($post->banner_id)->get_route() : 'img/default-image.png') ) }}')"
                            data-toggle="modal" data-target="#modal-multimedia">
                            <input type="hidden" name="banner" value="{{ old('banner') ?: $post->banner_id }} " />
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-md-3">Imagen</label>
                    <div class="col-md-9">
                        <div class="file_chooser preview" data-type="image" title="Haz clic para agregar una imagen"
                            style="background-image: url('{{ asset( old('image') ? \App\Image::find(old('image'))->get_route() : ( $post->thumbnail_id ? \App\Image::find($post->thumbnail_id)->get_route() : 'img/default-image.png') ) }}')"
                            data-toggle="modal" data-target="#modal-multimedia">
                            <input type="hidden" name="image" value="{{ old('image') ?: $post->thumbnail_id }}" />
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-md-3">Meta title (*)</label>
                    <div class="col-md-9">
                        <input type="text" value="{{ old('meta_title') ?: $post->meta_title }}" autocomplete="off" name="meta_title"
                            class="form-control">
                        <small class="form-text text-muted">No exceda los 55 caracteres</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-md-3">Meta description (*)</label>
                    <div class="col-md-9">
                        <textarea name="meta_description" maxlength="115" class="form-control"
                            rows="2">{{ old('meta_description') ?: $post->meta_description }}</textarea>
                        <small class="form-text text-muted">No exceda los 115 caracteres</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-md-3">Contenido (*)</label>
                    <div class="col-md-9">
                        <input type="hidden" name="content">
                        <div class="editor-wraper">
                            <div id="editor">
                               {!! $post->content !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <input type="hidden" name="status">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary mr-2">ATRÁS</a>
                    <button type="submit" data-action="publish" class="btn action-submit btn-primary mr-2">PUBLICAR</button>
                    <button type="submit" data-action="draft" class="btn action-submit btn-warning">GUARDAR COMO BORRADOR</button>
                </div>
            </form>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="modal-multimedia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Elegir imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    var modal = "";

    //dropify

    $(document).ready(function(){

        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                    'history': {          // Enable with custom configurations
                        'delay': 2500,
                        'userOnly': true
                    },
                    toolbar: [
                        [{ header: [2,3,4, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        ['link', 'image', 'code-block'],
                        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                        [{ 'font': [] }],
                        [{ 'align': [] }],
                        ['clean']
                    ]
            },
            placeholder: 'Escribe aquí...',
        });

        $("input[name=title]").keyup(function(){
            var cad = $(this).val();
            console.log(cad);
            $("input[name=slug]").val(friendly_url(cad));
            $("input[name=meta_title]").val(cad);
        });

        $(".file_chooser").click(function(){
            modal = $(this).attr("data-type");
            $.ajax({
                type: 'GET',
                url: "{{ route('images.search') }}",
                dataType: 'json',
                success: function(data) {
                    $(".modal-body .row").empty();
                    if(data.length == 0){
                        $(".modal-body .row").append(`<em>No hay imágenes subidas</em>`)
                        return
                    }
                    for(var i=0; i < data.length; i++){
                        var route = `{{ url("storage/") }}/${data[i]['route']}`
                        $(".modal-body .row").append(`<div class="col-xs-6 col-md-3"> <div class="thumbnail" data-id="${data[i]['id']}" data-src="${route}" style="background-image: url('${route}')"> </div></div>`);
                    }
                },
                error: function(data) {
                    toastr.error("Error al cargar las imágenes");
                }
            });
        });

        $("#modal-multimedia").on("click",".thumbnail",function(){
            var id = $(this).data("id");
            var src = $(this).data("src");
            $(".file_chooser[data-type="+modal+"]").css("background-image","url("+src+")");
            $(".file_chooser[data-type="+modal+"] input").val(id);
            $(".modal").modal('hide');
        });

        //validate
        $(".action-submit").click(function(){
            var $btn = $(this)
            var action = $(this).data('action')
            var $thisForm = $("#msform");

            $thisForm.validate({
                rules: {
                    published_at: "required",
                    title: "required",
                    meta_title: {
                        required: true,
                        maxlength: 55
                    },
                    slug: "required",
                    category: "required",
                    meta_description: "required",
                },
                errorClass: 'is-invalid',
                ignore: [],
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "url") {
                        error.insertAfter("#urlwraper");
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    $("[name=content]").val($(".ql-editor").html())
                    $("[name=status]").val(action == "draft" ? '2' : '1')
                    form.submit()
                    return false;
                }
            });
        });
    });

</script>
@endsection
