<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome to ABHCARS - Your Destination for Quality Used Cars</title>
    <meta name="description"
        content="Discover a wide range of quality used cars at ABHCARS. Scan our unique QR codes to access detailed information about each vehicle - brand, year, fuel type, and more. Find your perfect car hassle-free!">
    <meta name="keywords" content="ABHCARS, used cars, quality vehicles, QR code, car sales, pre-owned cars">
    <meta name="author" content="ABHCARS">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="og:title" content="Welcome to ABHCARS - Your Destination for Quality Used Cars">
    <meta name="og:description"
        content="Discover a wide range of quality used cars at ABHCARS. Scan our unique QR codes to access detailed information about each vehicle - brand, year, fuel type, and more. Find your perfect car hassle-free!">
    <meta name="og:image" content="https://www.example.com/abhcars-logo.png">
    <meta name="og:url" content="https://www.abhcars.in">
    <meta name="og:type" content="website">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Welcome to ABHCARS - Your Destination for Quality Used Cars">
    <meta name="twitter:description"
        content="Discover a wide range of quality used cars at ABHCARS. Scan our unique QR codes to access detailed information about each vehicle - brand, year, fuel type, and more. Find your perfect car hassle-free!">
    <meta name="twitter:image" content="https://www.example.com/abhcars-logo.png">
    <link rel="canonical" href="https://www.abhcars.in">
    <!-- Other necessary meta tags or links go here -->
    @yield('tags')
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('siteassets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ url('siteassets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('siteassets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('siteassets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('siteassets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ url('siteassets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('siteassets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ url('siteassets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="index.html">ABHCars</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
                    {{-- <li><a class="nav-link scrollto" href="#vehicals">Vehicals</a></li> --}}
                    <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
                    <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>New Way To Sell Old Cars</h1>
                    <h2>Transforming used car market for the Digital Age</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="{{ url('/dealer/2') }}" class="btn-get-started scrollto" target="_blank">View
                            Demo </a>

                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ url('siteassets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Clients Section ======= -->
        <!-- <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section> -->
        <!-- End Cliens Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About ABHCARS</h2>
                </div>

                <div class="row content">
                    <div class="col-lg-12 pt-4 pt-lg-0">
                        <p>
                            &nbsp;&nbsp;Welcome to ABHCars, where we redefine the way you shop for used cars. Our
                            platform is designed to revolutionize the car-buying experience by leveraging cutting-edge
                            technology to provide comprehensive information about every vehicle at your fingertips.<br>

                            &nbsp;&nbsp;At ABHCars, we understand that purchasing a used car can be a daunting task.
                            That's why we've created an innovative solution that puts the power in your hands. With our
                            user-friendly platform and unique QR code system, you can access detailed information about
                            each car in our inventory instantly.

                            Gone are the days of uncertainty and guesswork when
                            searching for your ideal vehicle.
                            <br>
                            &nbsp;&nbsp;Our mission is simple: to offer transparency, convenience, and reliability in
                            the used car
                            market. We aim to empower buyers with the information they need to make confident decisions,
                            all without the need for traditional salesmen.
                        </p>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <ul>
                            <li><i class="ri-check-double-line"></i>Comprehensive Information: Each vehicle on our
                                platform is equipped with a QR code that provides extensive details, including brand,
                                year, fuel type, mileage, and more. Scan, explore, and make informed choices
                                effortlessly.</li>
                            <li><i class="ri-check-double-line"></i>Transparency and Trust: We prioritize accuracy and
                                reliability in the information we provide. Trust and transparency are at the core of our
                                values.</li>


                        </ul>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <ul>
                            <li><i class="ri-check-double-line"></i>User-Centric Experience: Our user-friendly
                                interface ensures a seamless and intuitive experience for all users. Buying a used car
                                has never been this easy.</li>
                            <li><i class="ri-check-double-line"></i>Innovation: We're at the forefront of innovation in
                                the automotive industry, continually exploring new ways to enhance the car-buying
                                journey.</li>


                        </ul>
                    </div>

                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="row">
                    <div class="col-lg-9 text-center text-lg-start">
                        <h3>Interested? Call now !</h3>
                        <p>Call now and get your digital menu card today!</p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="tel:8830256110">Call</a>
                    </div>
                </div>

            </div>
        </section><!-- End Cta Section -->




        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Pricing</h2>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" onchange="changeRate()"
                                    id="currency">
                                <label class="form-check-label" for="currency">View USD Rates</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="box">
                            <h3>Free</h3>
                            <h4 id="rate1"></h4>
                            <ul>
                                <li><i class="bx bx-check"></i> Access from anywhere</li>
                                <li><i class="bx bx-check"></i> 5 Categories</li>
                                <li><i class="bx bx-check"></i> 30 Menu Items</li>
                                <li class="na"><i class="bx bx-x"></i> <span>24X7 Support</span></li>
                                <li class="na"><i class="bx bx-x"></i> <span>Free Data Entry</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="box featured">
                            <h3>Monthly</h3>
                            <h4 id="rate2"></h4>
                            <ul>
                                <li><i class="bx bx-check"></i> Access from anywhere</li>
                                <li><i class="bx bx-check"></i> Unlimited Categories</li>
                                <li><i class="bx bx-check"></i> Unlimited Menu Items</li>
                                <li><i class="bx bx-check"></i> 24X7 Support</li>
                                <li class="na"><i class="bx bx bx-x"></i> <span>Free Data Entry</span></li>
                            </ul>
                            <!-- <a href="#" class="buy-btn">Get Started</a> -->
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="box">
                            <h3>Yearly</h3>
                            <h4 id="rate3"></h4>
                            <ul>
                                <li><i class="bx bx-check"></i> Access from anywhere</li>
                                <li><i class="bx bx-check"></i> Unlimited Categories</li>
                                <li><i class="bx bx-check"></i> Unlimited Menu Items</li>
                                <li><i class="bx bx-check"></i> 24X7 Support</li>
                                <li><i class="bx bx-check"></i> Free Data Entry</li>
                            </ul>
                            <!-- <a href="#" class="buy-btn">Get Started</a> -->
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Pricing Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Frequently Asked Questions</h2>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i>
                            <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">
                                How does the QR code system work?
                                <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    Our platform utilizes a unique QR code for each vehicle listed. Simply scan the QR
                                    code using your smartphone's camera or a QR code reader app. Instantly, you'll
                                    access comprehensive details about the car, including its make, model, year,
                                    mileage, fuel type, and more.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">
                                Are the details provided via QR codes accurate and up-to-date?<i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    We prioritize accuracy and regularly update the information associated with each QR
                                    code. However, as inventory changes, there might be occasional delays in updating
                                    details. Rest assured, we strive to maintain accurate and current information.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed">
                                Do guests need an internet connection to view the digital menu card? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Yes, guests require an internet connection to access the digital menu card. Once
                                    they scan the QR code, the menu is typically hosted on a website or a dedicated app
                                    that requires an active internet connection to load the content.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-4" class="collapsed">
                                Can I view additional media, such as photos or videos, of the cars listed?<i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Yes, you can! Alongside the QR code system, our platform features high-quality
                                    images, videos, and 360-degree views of most vehicles to give you a comprehensive
                                    visual understanding of the car's condition and features.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="500">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-5" class="collapsed">
                                How do I purchase a car through your platform?<i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    You can browse our inventory, scan QR codes for detailed information, and once
                                    you've found the car you want, contact us directly through the platform. Our team
                                    will assist you in finalizing the purchase process and arranging necessary
                                    documentation
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="500">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-6" class="collapsed">
                                Do you offer financing options for buyers?<i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-6" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    While we don't directly provide financing, we can assist you by connecting you with
                                    our trusted partners who specialize in financing options. Feel free to inquire for
                                    more details.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 footer-contact">
                        <h3>ABHCARS</h3>
                        <p>
                            NEAR SAINATH HOSPITAL<br>
                            MAIN ROAD RUKDI <br>
                            NEAR ICC BANK ATM <br>
                            PIN 416118 <br><br>
                            <strong>Phone:</strong> +91 90964 18208<br>
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Demo</a></li>

                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Leagel</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('siteassets/vendor/aos/aos.js') }}"></script>
    <script src="{{ url('siteassets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('siteassets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ url('siteassets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('siteassets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('siteassets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ url('siteassets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('siteassets/js/main.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            setInr();
        });

        function changeRate() {
            if ($('#currency').is(":checked")) {
                $("#rate1").html(
                    '<sup>$</sup>0<span>7 Days</span>');
                $("#rate2").html(
                    '<sup>$</sup>10<span>per month</span>');
                $("#rate3").html(
                    '<sup>$</sup>100<span>per year</span>');
            } else
                setInr()
        }

        function setInr() {
            $("#rate1").html('<sup>₹</sup>0<span>7 Days</span>');
            $("#rate2").html('<sup>₹</sup>599<span>per month</span>');
            $("#rate3").html('<sup>₹</sup>5999<span>per year</span>');
        }
    </script>

</body>

</html>
