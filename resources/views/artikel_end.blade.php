@extends('template')

@section('title')
    Artikel
@endsection

@section('header')
    Artikel
@endsection

@section('content')
    <section>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control" name="judul" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Foto</label>
                                <input type="file" class="form-control" name="foto" required>
                            </div>
                            <div class="form-group">
                                <label>Penulis</label>
                                <input type="text" class="form-control" name="penulis">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="deskripsi"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#modal-default">Tambah</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Foto</th>
                            <th>Penulis</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="fw-bold">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>
                                    <img class="img-thumbnail" width="100px"
                                        src="{{ asset('fotoBackend/' . $item->foto) }}" alt="">
                                </td>
                                <td>{{ $item->penulis }}</td>
                                <td>{{ Str::limit($item->deskripsi, 20, '...') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="destroy/{{ $item->id }}" class="btn btn-danger"
                                            onclick="return confirm('yakin hapus ? {{ $item->judul }}')">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                        <a href="/show_artikel_end/{{ $item->id }}" class="btn btn-success">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Foto</th>
                            <th>Penulis</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
@endsection
