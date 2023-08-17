<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>New Rail - The new generation of railway catering</title>
    <meta
        content="Na NewRail, estamos a redefinir a experiência de viagem nos comboios Alfa e Intercidades. Como líderes em catering ferroviário, nosso compromisso é proporcionar-lhe uma viagem excepcional, onde a comodidade e o sabor se encontram."
        name="description">

    <!-- Favicons -->
    <link href="/website/assets/img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/website/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/website/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/website/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/website/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/website/assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex justify-content-between align-items-center">

            <div id="logo">
                <a href="/"><img src="/website/assets/img/logo-white.png" style="max-width: 200px;"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Início</a></li>
                    <li><a class="nav-link scrollto" href="#about">A empresa</a></li>
                    <li><a class="nav-link scrollto" href="#features">Serviços</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contactos</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    @yield('header')

    <main id="main">

        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-lg-start text-center">
                    <div class="copyright">
                        &copy; Copyright <strong>Avilon</strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        Developed by <a href="https://netlook.pt">Netlook</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                        <a href="/politica-privacidade">Política de privacidade</a>
                        <a href="/termos-condicoes">Termos e condições</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-chevron-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="/website/assets/vendor/aos/aos.js"></script>
    <script src="/website/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    <script src="https://malsup.github.io/jquery.form.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/website/assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/website/assets/js/main.js?v={{ rand() }}"></script>

</body>

</html>