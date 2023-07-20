@extends('template')

@section('title')
    Edit Artikel End
@endsection
@section('header')
    Edit Artikel End
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('edit_artikel_end', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="judul" required
                                        value="{{ $data->judul }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Foto</label>
                                    <input type="text" class="form-control text-center border-0"
                                        value="{{ $data->foto }}" readonly>
                                    <input type="file" class="form-control" name="foto" required>
                                </div>
                                <div class="form-group">
                                    <label>Penulis</label>
                                    <input type="text" class="form-control" name="penulis" value="{{ $data->penulis }}">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control text-center" placeholder="Enter ..." name="deskripsi">
                                          {{ $data->deskripsi }}
                                    </textarea>
                                </div>
                                <div class="gap-2 d-grid">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
