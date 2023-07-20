@extends('main')

@section('title')
    home
@endsection
@section('header')
    <header class="masthead" style="background-image: url({{ asset('assets/blog/assets/img/home-bg.jpg') }})">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Bro Artikel</h1>
                        <span class="subheading fst-italic">Baca artikel terbaru dan gratis!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @if (count($data))
                    @foreach ($data as $item)
                        <!-- Post preview-->
                        <div class="post-preview">
                            <a href="preveiew_artikel/{{ $item->id }}">
                                <h2 class="post-title">{{ $item->judul }}</h2>
                                <h3 class="post-subtitle">{{ Str::limit($item->deskripsi, 100, '...') }}</h3>
                            </a>
                            <p class="post-meta">
                                Posted by
                                <a href="#!"> {{ $item->penulis }} </a>
                                {{ $item->created_at }}
                            </p>
                        </div>
                        <!-- Divider-->
                        <hr class="my-4" />
                    @endforeach
                @endif
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase"
                        href="/artikel">Artikel Lain
                        →</a></div>
            </div>
        </div>
    </div>
@endsection
