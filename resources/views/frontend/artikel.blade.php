@extends('main')

@section('title')
    Article
@endsection
@section('content')
    <header class="masthead bg-white"
        style="background-image: url('{{ asset('assets/img/warnemunde-g22548f459_1920.jpg') }}')">
        <div class="container position-relative px-4 px-lg-5 ">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 ">
                    <div class="post-heading">
                        <h1 class="text-center">Berikut beberapa artikel terbaru dari kami</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row">
                @foreach ($artikel as $item)
                    <div class="col-md-4 mb-3">
                        <div class="card border-0 shadow">
                            <div class="card-header">
                                <img width="100%" src="{{ asset('fotoBackend/' . $item->foto) }}" alt="">
                            </div>
                            <div class="card-body">
                                <h6 class="text-center">{{ $item->judul }}</h6>
                                <hr>
                                <article class="text-center">
                                    <p>
                                        <a href="preveiew_artikel/{{ $item->id }}" class="text-decoration-none">
                                            {{ Str::limit($item->deskripsi, 100, '...') }}
                                        </a>
                                    </p>
                                </article>
                                <p class="text-center">
                                    <span class="fw-bold text-center">writter </span>{{ $item->penulis }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </article>
@endsection
