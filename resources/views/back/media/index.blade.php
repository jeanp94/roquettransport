@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
<style>
    .uploadtitle {
        font-size: 20px
    }

    .thumbnail {
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
            <li class="breadcrumb-item active" aria-current="page">Multimedia</li>
        </ol>
    </nav>

    <h1>MULTIMEDIA</h1>

    <form class="dropzone my-4" action="{{ route('images.store') }}" id="add-images-zone">
        <div class="dz-message needsclick">
            <span class="uploadtitle">Suelta los archivos aquí</span><br>
            <span class="note needsclick">Puedes subir hasta 10 imágenes a la vez. JPG, JPEG, PNG</span>
        </div>
    </form>

    <div class="row my-3" id="images-drag-area">
        @foreach($medias as $media)
        <div class="col-xs-6 col-md-3">
            <a data-target="#showimagemodal" href="#!" data-toggle="modal" title="{{ $media->alt }}"
                data-src="{{ asset($media->get_route()) }}"
                data-deleteaction="{{ route('images.destroy', $media->id) }}" class="action-show-image thumbnail"
                style="background-image: url('{{ asset($media->get_route()) }}')">
            </a>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="showimagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <img class="img-fluid" src="" alt="image">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form method="post" action="">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-danger action-delete-image"><i class="fa fa-trash"></i>
                        Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/dropzone.js') }}"></script>
<script>
    Dropzone.options.addImagesZone = {
            paramName: "image",
            maxFiles: 10,
            maxFilesize: 5, // MB
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            dictRemoveFile: " Quitar",

            init: function () {
                this.on("sending", function(file, xhr, formData){
                    formData.append("_token", "{{ csrf_token() }}");
                });

                this.on("processing", function (file, response) {
                    console.log('Procesando archivo '+file.name)
                });

                this.on("success", function (file, response) {
                    if (response.rpta == "ok") {
                        this.removeFile(file);
                        toastr.success(response.msg);
                        $("#images-drag-area").prepend(`<div class="col-xs-6 col-md-3">
            <a data-target="#showimagemodal" href="#!" data-toggle="modal" data-src="${response.image_route}" data-deleteaction="${response.image_deleteaction}" title="${response.image_alt}" class="action-show-image thumbnail" style="background-image: url('${response.image_route}')">
            </a>
        </div>`)
                    }
                    else{
                        this.removeFile(file);
                    }
                });

                this.on("error", function (file, response) {
                    if (response.errors) {
                        jQuery.each(response.errors, function (i, val) {
                            toastr.error(val);
                        });
                    } else {
                        console.log(response)
                        // toastr.error("Ocurrió un error inesperado");
                    }
                    this.removeFile(file);
                });
            },
        };

    var $imgelem

    $(document).ready(function(){
        $("#images-drag-area").on('click', '.action-show-image', function(){
            $imgelem = $(this).parent()
            var src = $(this).data('src')
            var action = $(this).data('deleteaction')
            $("#showimagemodal img").attr('src',src)
            $("#showimagemodal form").attr('action',action)
        })

        $(".action-delete-image").click(function (e) {
            var url = $("#showimagemodal form").attr('action')
            $.ajax({
                url: url,
                method: 'delete',
                dataType: 'json',
                success: function (data) {
                    if(data.rpta == "ok"){
                        $("#showimagemodal").modal('hide')
                        $imgelem.fadeOut()
                        setTimeout(() => {
                            $imgelem.remove()
                        }, 1000);
                    }
                    toastr.error(data.msg)
                },
                error: function (response) {
                    toastr.error('Ocurrió un error inesperado')
                }
            })

        })
    });

</script>
@endsection
