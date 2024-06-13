<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pemerintahan Kota Tangerang</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="storage/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">Musik Tangerang
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#ket">Keterangan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Profil</a></li>
                    @if (Auth::check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li class="nav-item">
                                <button class="nav-link transparent-button" href="{{ route('logout') }}">LOGOUT</button>
                        </form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Selamat Datang!</div>
            <div class="masthead-heading text-uppercase">Pecinta Musik</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="{{ route('index-public') }}">Lokasi Toko Musik di
                Kota Tangerang nih!</a>
        </div>
    </header>

    <!-- Services-->
    <section class="page-section" id="ket">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Musik</h2>
                <h3 class="section-subheading text-muted">Menurut sebuah penelitian di Ohio State University,
                    mendengarkan musik favorit dapat menurunkan kecemasan di antara pasien ICU hingga sekitar
                    sepertiganya. Para peneliti juga mengungkapkan, dalam hal ini bukan sembarang lagu yang didengarkan,
                    lagu tersebut harus menjadi bagian yang akrab dan menghibur.
                </h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x mb-4">
                        <img src="/storage/img/akustik.jpg" alt="Ekonomi Image" class="img-fluid" width="130"
                            height="150">
                    </span>
                    <h4 class="my-3">Akustik</h4>
                    <p class="text-muted">
                        Musik akustik adalah subgenre musik yang sangat menekankan pada penggunaan alat musik yang tidak
                        membutuhkan listrik untuk menghasilkan suara. Musik akustik menekankan pada suara instrumen yang
                        masih mentah dan belum diolah seperti gitar akustik, piano, biola, atau cajon. Musik akustik
                        menampilkan keindahan suara organik murni tanpa menggunakan listrik atau amplifikasi.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <img src="/storage/img/fender.jpg" alt="Ekonomi Image" class="img-fluid" width="200"
                            height="300">
                    </span>
                    <h4 class="my-3">Elektronik</h4>
                    <p class="text-muted">Musik elektronik secara umum, dapat dibedakan antara suara yang
                        diproduksi menggunakan cara elektromekanis (musik elektroakustik), dan
                        yang diproduksi hanya menggunakan elektronik. Instrumen elektromekanis
                        mengandung elemen mekanik, seperti dawai, palu, dan sebagainya, dan
                        elemen elektrik, seperti pickup magnetik, power amplifier dan pengeras
                        suara. Contoh perangkat penghasil suara elektromekanis termasuk
                        telharmonium, organ Hammond, dan gitar listrik, yang biasanya dibuat cukup
                        keras untuk didengar oleh pemain dan audiens dengan penguat instrumen
                        dan kabinet speaker..</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <img src="/storage/img/ritmis.jpg" alt="Ekonomi Image" class="img-fluid" width="200"
                            height="300">
                    </span>
                    <h4 class="my-3">Ritmis</h4>
                    <p class="text-muted">Alat musik ritmis berkaitan juga dengan alat musik yang menjalankan fungsi
                        untuk mengatur ritme atau irama pada musik. Ini juga berkaitan dengan fungsi ketukan dan birama.
                        Perbedaannya dari alat musik pada umumnya, jenis ini tidak menghasilkan banyak nada seperti alat
                        musik melodis. </p>
                </div>
            </div>
    </section>

    <!-- Profil -->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Profil</h2>
            </div>
            <div class="row">
                <div class="align-items-center">
                    <div class="team-member">
                        <img class="mx-auto" src="/storage/img/raga.jpg" alt="..." />
                        <h4>Harits Nuraga Padika</h4>
                        <p class="text-muted">22/494436/SV/20823</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="text-body-secondary py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a>Sistem Informasi Geografis 2023</a>
            </p>
            <p class="mb-1">Harits Nuraga Padika</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
