<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editor Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="font-monospace">
    <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="#">Bro Artikel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link anim-underline" href="/">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card rounded-0 shadow-sm border-black">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    @foreach ($data as $item)
                                        <div class="card rounded-0 shadow-sm border-black mb-2">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4 text-center"
                                                        style="border-right: 1px solid black">
                                                        <img class="img-fluid mt-4"
                                                            src="{{ asset('fotoBackend/' . $item->foto) }}">
                                                    </div>
                                                    <div class="col-md-7">
                                                        <ul style="list-style-type: none;" class="fw-bold">
                                                            <li class="mb-3">
                                                                <i class="fa-solid fa-heading fs-4"></i>
                                                                Judul <span>{{ $item->judul }}</span>
                                                            </li>
                                                            <hr>
                                                            <li class="mb-3">
                                                                <i class="fa-solid fa-user-pen fs-4"></i>
                                                                Penulis <span>{{ $item->penulis }}</span>
                                                            </li>
                                                            <hr>
                                                            <li class="mb-3">
                                                                <i class="fa-solid fa-book-open fs-4"></i>
                                                                Deskripsi
                                                                <span>{{ Str::limit($item->deskripsi, 50) }}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-black">
                                                <a href="/delete_editor_artikel/{{ $item->id }}"
                                                    class="btn btn-danger rounded-0"
                                                    onclick="return confirm('Yakin bakal hapus ? {{ $item->judul }}')">DELETE</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-5">
                                    <div class="card rounded-0 shadow-sm border-black">
                                        <div class="card-header border-black bg-white">
                                            <marquee behavior="" direction="">Tulis lah artikel mu</marquee>
                                        </div>
                                        <div class="card-body">
                                            <form action="/process_insert_artikel" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label">Judul</label>
                                                    <input type="text" class="form-control border-black rounded-0"
                                                        name="judul" id="inputField">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Foto</label>
                                                    <input type="file" class="form-control border-black rounded-0"
                                                        name="foto" id="imageInput">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Penulis</label>
                                                    <input type="text" class="form-control border-black rounded-0"
                                                        name="penulis" id="inputField2">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="floatingTextarea2">Deskripsi</label>
                                                    <textarea class="form-control border-black rounded-0" id="inputField3" style="height: 200px" name="deskripsi"></textarea>

                                                </div>
                                                <button type="submit"
                                                    class="btn btn-outline-dark rounded-0 border-black">Submit</button>
                                                <button type="button"
                                                    class="btn btn-outline-dark rounded-0 border-black"
                                                    style="float: right" id="clearButton">Batal</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const inputField = document.getElementById('inputField');
        const inputField2 = document.getElementById('inputField2');
        const inputField3 = document.getElementById('inputField3');
        const clearButton = document.getElementById('clearButton');
        const imageInput = document.getElementById('imageInput');

        clearButton.addEventListener('click', function() {
            inputField.value = '';
            inputField2.value = '';
            inputField3.value = '';
            imageInput.value = null;

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
