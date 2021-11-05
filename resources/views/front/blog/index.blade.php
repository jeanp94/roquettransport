@extends('layouts.web')

@section('styles')
<style>
    #blogbanner {
        background-image: url("{{ asset('img/blog.jpg') }}");
        background-position: center center;
        background-size: cover;
    }
</style>
@endsection

@section('page_title','Blog | Roque Transport')
@section('page_description', 'Entérate de nuestros últimos proyectos y las últimas noticias del sector de transporte en el Perú')

@section('content')
<!-- .page-title start -->
<div id="blogbanner" class="page-title-style01 page-title-negative-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Blog</h1>

                <div class="breadcrumb-container">
                    <ul class="breadcrumb clearfix">
                        <li>Estás aquí:</li>
                        <li>
                            <a href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li>
                            Blog
                        </li>
                    </ul><!-- .breadcrumb end -->
                </div><!-- .breadcrumb-container end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-title-style01.page-title-negative-top end -->

<div class="page-content custom-bkg bkg-grey">
    <div class="container">
        <div class="row">
            <ul class="col-md-12 blog-posts isotope masonry">
                @forelse($posts as $post)
                <li class="blog-post clearfix isotope-item">
                    <div class="post-info clearfix">
                        <div class="post-date">
                            <p>
                                <i class="fa fa-calendar-alt"></i>
                                {{ \Carbon\Carbon::parse($post->published_at)->isoFormat('DD MMMM, YYYY')  }}
                            </p>
                        </div><!-- .post-date end -->

                        <div class="post-category">
                            <a href="{{ route('posts.read', $post->slug) }}">{{ $post->category->name }}</a>
                        </div>
                    </div><!-- .post-info end -->

                    <div class="post-body">
                        <a href="{{ route('posts.read', $post->slug) }}">
                            <h3>{{ $post->title }}</h3>
                        </a>

                        <p>
                            {{ $post->meta_description }}
                        </p>
                    </div><!-- .post-body end -->

                    @if($post->image)
                    <div class="post-media">
                        <a href="{{ route('posts.read', $post->slug) }}" class="post-img">
                            <img src="{{ asset($post->image->get_route()) }}"
                                alt="Trucking Transportation and Logistics HTML template" />
                        </a>
                    </div><!-- .post-media end -->
                    @endif
                    <div class="post-footer">
                        <ul class="post-meta">
                            <li class="comments fa fa-eye"><a
                                    href="{{ route('posts.read', $post->slug) }}">{{ $post->views }}</a></li>
                            {{-- <li class="post-like fa fa-heart" data-url="http://www.envato.com"
                                data-text="This is an example of sharing your blog post"></li> --}}
                        </ul><!-- .post-meta end -->

                        <a href="{{ route('posts.read', $post->slug) }}" class="read-more">
                            <span>
                                Leer más
                                <i class="fa fa-external-link-alt"></i>
                            </span>
                        </a>
                    </div><!-- .post-meta end -->
                </li><!-- .blog-post end -->
                @empty
                <em style="padding: 50px 30px">No hay artículos aún</em>
                @endforelse
            </ul><!-- .col-md-12.blog-posts.post-list end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

@endsection

@section('scripts')
<script src="{{ asset('front/js/jquery.isotope.min.js') }}"></script><!-- jQuery isotope plugin -->
<script src="{{ asset('front/sharre/jquery.sharrre-1.3.4.min.js') }}"></script><!-- .for post likes -->
<script>
    /* <![CDATA[ */
            jQuery(document).ready(function ($) {
                'use strict';

                //ISOTOPE START
                (function () {
                    // cache container
                    var $blogmasonry = $('.blog-posts.masonry');
                    // initialize isotope
                    $blogmasonry.isotope({
                        masonry: {
                            columnWidth: 1,
                            isResizable: true
                        }
                    });
                })(); // ISOTOPE END

                //JQUERY SHARRE
                $('.post-like').sharrre({
                    share: {
                        facebook: true
                    },
                    enableHover: false,
                    enableTracking: true,
                    click: function (api, options) {
                        api.simulateClick();
                        api.openPopup('facebook');
                    }
                });
            });
            /* ]]> */
</script>
@endsection
