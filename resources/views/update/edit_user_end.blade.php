@extends('template')

@section('title')
    Edit User
@endsection
@section('header')
    Edit User
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <a href="/">
                                <i class="fa-solid fa-arrow-left"></i> Back
                            </a>
                        </div>
                        <div class="card-body">
                            @if ($data)
                                <form action="{{ url('update_user_end', $data->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $data->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $data->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="password"
                                                value="{{ $data->password }}" id="myInput">
                                            <button type="button" class="btn btn-outline-dark rounded-0"
                                                onclick="copyText()"><i class="fa-solid fa-copy"></i></button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="repeat_password"
                                                value="{{ $data->repeat_password }}" id="myInput">
                                            <button type="button" class="btn btn-outline-dark rounded-0"
                                                onclick="copyText()"><i class="fa-solid fa-copy"></i></button>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            @else
                                <p>Data tidak di temukan</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
