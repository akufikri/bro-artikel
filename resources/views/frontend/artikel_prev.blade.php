@extends('main')

@section('title')
    Preview Artikel
@endsection
@section('content')
    <header class="masthead" style="background-image: url('{{ asset('fotoBackend/' . $artikel->foto) }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{ $artikel->judul }}</h1>
                        <span class="meta">
                            Posted by
                            <a href="#!">{{ $artikel->penulis }}</a>
                            {{ $artikel->created_at }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <img class="img-fluid" src="{{ asset('fotoBackend/' . $artikel->foto) }}" alt="">
                    <p>{{ $artikel->deskripsi }}</p>
                    Placeholder text by
                    <a href="#">{{ $artikel->penulis }}</a>
                    &middot; Images by
                    <a href="#">{{ $artikel->penulis }}</a>
                    </p>
                </div>
            </div>
        </div>
    </article>
@endsection
