@extends('layouts.web')

@section('styles')
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v7.0&appId=362173300924652&autoLogAppEvents=1"
    nonce="sXdlg7m3"></script>

{{-- <script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v7.0'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> --}}

<style>
    #blogbanner {
        background-image: url("{{ asset('img/blog.jpg') }}");
        background-position: center center;
        background-size: cover;
        position: relative;
    }

    #blogbanner:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .post-media .post-img img {
        width: 100%;
    }

    .rpw_posts_widget ul>li::before {
        font-family: 'Font Awesome 5 Free';
    }

    .share_secc {
        margin-bottom: 100px;
    }

    .share_secc ul {
        display: inline-block;
        /* padding-left: 10px; */
    }

    .share_secc ul li {
        display: inline-block;
    }

    .share_secc ul li.fb button {
        background-color: #516eaa;
        /* width: 150px; */
    }

    .share_secc ul li.twitter a {
        background-color: #26c5f6;
        /* width: 150px; */
    }

    .share_secc ul li.linked a {
        background-color: #0177b5;
    }

    .share_secc ul li.whatsapp a {
        background-color: #2cb742;
    }

    .share_secc ul li a,
    .share_secc ul li button {
        display: inline-block;
        width: 50px;
        height: 40px;
        color: white;
        padding: 10px 0;
        border: 0;
        text-align: center;
        margin: 5px;
        transition: all 0.1s ease-in;
    }

    .fb-comments {
        display: block;
        margin-bottom: 100px;
    }
</style>
@endsection

@section('page_title', $post->meta_title.' | Roque Transport')
@section('page_description', $post->meta_description)

@section('content')
<!-- .page-title start -->
<div id="blogbanner"
    style="background-image: url('{{ asset($post->banner ? $post->banner->get_route() : 'img/blog.jpg') }}')"
    class="page-title-style01 page-title-negative-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $post->title }}</h1>

                <div class="breadcrumb-container">
                    <ul class="breadcrumb clearfix">
                        <li>Estás aquí:</li>
                        <li>
                            <a href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li>
                            <a href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li>
                            Leer
                        </li>
                    </ul><!-- .breadcrumb end -->
                </div><!-- .breadcrumb-container end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-title-style01.page-title-negative-top end -->

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 blog-posts post-single">
                <div class="blog-post clearfix">

                    @if($post->image)
                    <div class="post-media">
                        <div class="post-img">
                            <img src="{{ asset($post->image->get_route()) }}" alt="{{ $post->image->alt }}" />
                        </div>
                    </div><!-- .post-media end -->
                    @endif

                    <div class="post-date">
                        <p class="day">{{ \Carbon\Carbon::parse($post->published_at)->isoFormat('DD')  }}</p>
                        <p class="month">{{ \Carbon\Carbon::parse($post->published_at)->isoFormat('MMMM')  }}</p>
                    </div><!-- .post-date end -->

                    <div class="post-body">
                        <h2>{{ $post->title }}</h2>

                        <div id="post-content">
                            {!! $post->content !!}
                        </div>
                    </div><!-- .post-body end -->

                    <!-- .post-comments start -->
                    <div class="post-comments">
                        <div class="custom-heading">
                            <h3>Compartir</h3>
                            <div class="share_secc">
                                <ul>
                                    <li class="fb"><button type="button"><i class="fab fa-facebook-f"
                                                aria-hidden="true"></i></button></li>
                                    <li class="twitter"><a target="_blank"
                                            href="https://twitter.com/intent/tweet?text={{ $post->title }}&url={{ route('posts.read', $post->slug) }}"><i
                                                class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                    <li class="linked"><a target="_blank"
                                            href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('posts.read', $post->slug) }}&title={{ url($post->title) }}&summary=&source="><i
                                                class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
                                    <li class="whatsapp"><a target="_blank"
                                            href="https://api.whatsapp.com/send?text={{ route('posts.read', $post->slug)}}"><i
                                                class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>

                        </div><!-- .custom-heading end -->

                    </div><!-- .post-comments end -->

                    <!-- .post-comments start -->
                    <div class="post-comments">
                        <div class="custom-heading">
                            <h3>Comentarios</h3>
                            <!--                comentarios de fb         -->
                            <div class="fb-comments" data-href="{{ route('posts.read', $post->slug) }}"
                                data-numposts="5" data-width="100%"></div>
                        </div><!-- .custom-heading end -->

                    </div><!-- .post-comments end -->
                </div><!-- .blog-post end -->
            </div><!-- .col-md-9.blog-posts.post-list end -->

            <!-- aside.aside-left start -->
            <aside class="col-md-3 aside aside-left">
                <!-- .aside-widgets start -->
                <ul class="aside-widgets">
                    <!-- .widget.widget-search start -->


                    <!-- .widget.rpw_posts_widget start -->
                    <li class="widget rpw_posts_widget">
                        <div class="title">
                            <h3>últimos artículos</h3>
                        </div>

                        <ul>
                            @foreach ($latest_posts as $latest_post)
                            <li>
                                <a href="{{ route('posts.read', $latest_post->slug) }}">
                                    <h4>
                                        {{ $latest_post->meta_title }}
                                    </h4>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li><!-- .rpw_posts_widget end -->
                    <!-- .widget.rpw_posts_widget start -->
                    <li class="widget rpw_posts_widget">
                        <div class="title">
                            <h3>los más leídos</h3>
                        </div>

                        <ul>
                            @foreach ($most_viewed_posts as $most_viewed_post)
                            <li>
                                <a href="{{ route('posts.read', $most_viewed_post->slug) }}">
                                    <h4>
                                        {{ $most_viewed_post->meta_title }}
                                    </h4>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li><!-- .rpw_posts_widget end -->
                </ul><!-- .aside-widgets end -->
            </aside><!-- .aside.aside-left end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

@endsection

@section('scripts')
<script src="{{ asset('front/js/jquery.isotope.min.js') }}"></script><!-- jQuery isotope plugin -->
<script src="{{ asset('front/sharre/jquery.sharrre-1.3.4.min.js') }}"></script><!-- .for post likes -->
<script>
    $(".share_secc li.fb").click(function() {
            FB.ui({
                method: 'share',
                href: '{{ url()->current() }}',
            }, function(response){

            });
        })
</script>
@endsection
