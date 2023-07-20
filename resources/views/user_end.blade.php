@extends('template')

@section('title')
    Users
@endsection
@section('header')
    Users
@endsection
@section('content')
    <!---- Modal------>
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
                    <form action="insert_user_end" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Repeat Password</label>
                            <input type="text" class="form-control" name="repeat_password" required>
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
    <!---- Modal------>
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="text-center text-uppercase mb-3">
                        <b>
                            Daftar Users
                        </b>
                    </h4>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary"data-toggle="modal" data-target="#modal-default"><i
                            class="fa-solid fa-plus"></i> Tambah User</button>
                    <a href="print_user" target="_blank" class="btn btn-success float-right">Cetak User <i
                            class="fa-solid fa-print"></i></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!---- Daftar Users----->
                        @if (count($user))
                            @foreach ($user as $item)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            <img width="30%"
                                                src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png"
                                                alt="">
                                        </div>
                                        <div class="card-body">
                                            <ul>
                                                <li><b>Nama</b> : {{ $item->name }}</li>
                                                <li><b>Email</b> : {{ $item->email }}</li>
                                                <li>
                                                    <h6>
                                                        <b>
                                                            Password
                                                        </b>
                                                    </h6>
                                                    <form action="">
                                                        <div class="input-group">

                                                            <input readonly
                                                                class="form-control border-top-0 border-left-0 border-right-0 rounded-0 bg-transparent border-bottom"
                                                                type="text" name="" id="myInput"
                                                                value="{{ $item->password }}">
                                                            <button class="btn btn-outline-dark rounded-0"
                                                                onclick="copyText()"><i
                                                                    class="fa-solid fa-copy"></i></button>
                                                        </div>
                                                    </form>
                                                </li>
                                                <li>
                                                    <h6>
                                                        <b>
                                                            Backup Password
                                                        </b>
                                                    </h6>
                                                    <form action="">
                                                        <div class="input-group">

                                                            <input readonly
                                                                class="form-control border-top-0 border-left-0 border-right-0 rounded-0 bg-transparent border-bottom"
                                                                type="text" name="" id="myInput"
                                                                value="{{ $item->repeat_password }}">
                                                            <button class="btn btn-outline-dark rounded-0"
                                                                onclick="copyText()"><i
                                                                    class="fa-solid fa-copy"></i></button>
                                                        </div>
                                                    </form>
                                                </li>
                                            </ul>

                                        </div>
                                        <div class="card-footer">
                                            <div class="text-center">
                                                <a href="show_user_end/{{ $item->id }}" class="btn btn-success"><i
                                                        class="fa-regular fa-pen-to-square"></i>
                                                    Edit</a>
                                                <a href="delete_user_end/{{ $item->id }}" class="btn btn-danger"
                                                    onclick="return confirm('Yakin mau di hapus? {{ $item->name }}')">Delete
                                                    <i class="fa-regular fa-trash-can"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!---------------------->
                    </div>
                </div>
            </div>
            <center>
                <div class="loader mt-5">
                    <div>
                        <ul>
                            <li>
                                <svg fill="currentColor" viewBox="0 0 90 120">
                                    <path
                                        d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z">
                                    </path>
                                </svg>
                            </li>
                            <li>
                                <svg fill="currentColor" viewBox="0 0 90 120">
                                    <path
                                        d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z">
                                    </path>
                                </svg>
                            </li>
                            <li>
                                <svg fill="currentColor" viewBox="0 0 90 120">
                                    <path
                                        d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z">
                                    </path>
                                </svg>
                            </li>
                            <li>
                                <svg fill="currentColor" viewBox="0 0 90 120">
                                    <path
                                        d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z">
                                    </path>
                                </svg>
                            </li>
                            <li>
                                <svg fill="currentColor" viewBox="0 0 90 120">
                                    <path
                                        d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z">
                                    </path>
                                </svg>
                            </li>
                            <li>
                                <svg fill="currentColor" viewBox="0 0 90 120">
                                    <path
                                        d="M90,0 L90,120 L11,120 C4.92486775,120 0,115.075132 0,109 L0,11 C0,4.92486775 4.92486775,0 11,0 L90,0 Z M71.5,81 L18.5,81 C17.1192881,81 16,82.1192881 16,83.5 C16,84.8254834 17.0315359,85.9100387 18.3356243,85.9946823 L18.5,86 L71.5,86 C72.8807119,86 74,84.8807119 74,83.5 C74,82.1745166 72.9684641,81.0899613 71.6643757,81.0053177 L71.5,81 Z M71.5,57 L18.5,57 C17.1192881,57 16,58.1192881 16,59.5 C16,60.8254834 17.0315359,61.9100387 18.3356243,61.9946823 L18.5,62 L71.5,62 C72.8807119,62 74,60.8807119 74,59.5 C74,58.1192881 72.8807119,57 71.5,57 Z M71.5,33 L18.5,33 C17.1192881,33 16,34.1192881 16,35.5 C16,36.8254834 17.0315359,37.9100387 18.3356243,37.9946823 L18.5,38 L71.5,38 C72.8807119,38 74,36.8807119 74,35.5 C74,34.1192881 72.8807119,33 71.5,33 Z">
                                    </path>
                                </svg>
                            </li>
                        </ul>
                    </div><span>Tidak ada data User!</span>
                </div>
            </center>
            {{-- <h4 class="text-center mt-5 display-2">
                Tidak ada data user!
            </h4> --}}
            @endif
        </div>
    </section>
@endsection
