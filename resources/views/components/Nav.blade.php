<!-- Modal Register-->
<div class="modal fade" id="exampleModalRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Silahkan Register</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="register" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="text" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Repeat Password</label>
                        <input type="text" class="form-control" name="repeat_password" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Login -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Silahkan Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="loged" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <a class="reg-btn" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModalRegister">Register
                            Disini..</a>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.html">Bro Artikel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/artikel">Artikel</a></li>
                {{-- <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/tentang_kami">Tentang Kami</a></li> --}}

                @auth
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="insert_artikel">Tambah
                            Artikel</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link px-lg-3 py-3 py-lg-4 nav-link dropdown-toggle" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu border-white hover rounded-2 text-center bg-transparent p-0 shadow"
                            style="backdrop-filter: blur(5px);">
                            <li><a class="dropdown-item bg-transparent text-white" href="/logouted">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
