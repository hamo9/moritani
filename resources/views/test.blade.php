<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta
            name="keywords"
            content="html, css bootstrap, mega menu, navbar, large dropdown, menu CSS examples"
        />
        <meta
            name="description"
            content="Bootstrap 5 navbar megamenu examples with simple css demo code"
        />

        <title>
            Demo - Bootstrap navbar megamenu dropdown. html code example
        </title>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            crossorigin="anonymous"
        />
        @if (App::getLocale() == 'fr')
            <link rel="stylesheet" href="{{ asset('assets/css/fr.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('assets/css/ar.css') }}">
        @endif
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"
        ></script>

        <style type="text/css">
            .navbar .megamenu {
                padding: 1rem;
            }


            /* ============ desktop view ============ */
            @media all and (min-width: 992px) {
                .navbar .has-megamenu {
                    position: static !important;
                }
                .navbar .megamenu {
                    left: 0;
                    right: 0;
                    width: 100%;
                    margin-top: 0;
                }
            }
            /* ============ desktop view .end// ============ */

            /* ============ mobile view ============ */
            @media (max-width: 991px) {
                .navbar.fixed-top .navbar-collapse,
                .navbar.sticky-top .navbar-collapse {
                    overflow-y: auto;
                    max-height: 90vh;
                    margin-top: 10px;
                }
            }

            /* body
            {
                direction: rtl;
            } */
            /* ============ mobile view .end// ============ */
        </style>

        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function () {
                /////// Prevent closing from click inside dropdown
                document
                    .querySelectorAll(".dropdown-menu")
                    .forEach(function (element) {
                        element.addEventListener("click", function (e) {
                            e.stopPropagation();
                        });
                    });
            });
            // DOMContentLoaded  end
        </script>
    </head>
    <body>



        <div class="container">
            <!-- ============= COMPONENT ============== -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Brand</a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#main_nav"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div
                        class="collapse navbar-collapse"
                        id="main_nav"
                        style="flex-grow: 0"
                    >
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> About </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Services </a>
                            </li>

                            <li class="nav-item dropdown has-megamenu">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    Mega menu 1
                                </a>
                                <div class="dropdown-menu megamenu" role="menu">
                                    <div class="row g-3">
                                        <div class="col-lg-3 col-6">
                                            <div class="card" style="width: 18rem;">
                                                <img class="card-img-top" src="..." alt="Card image cap">
                                                <div class="card-body">
                                                  <h5 class="card-title">Card title</h5>
                                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                              </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-lg-3 col-6">
                                            <div class="card" style="width: 18rem;">
                                                <img class="card-img-top" src="..." alt="Card image cap">
                                                <div class="card-body">
                                                  <h5 class="card-title">Card title</h5>
                                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                              </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-lg-3 col-6">
                                            <div class="card" style="width: 18rem;">
                                                <img class="card-img-top" src="..." alt="Card image cap">
                                                <div class="card-body">
                                                  <h5 class="card-title">Card title</h5>
                                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                              </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="card" style="width: 18rem;">
                                                <img class="card-img-top" src="..." alt="Card image cap">
                                                <div class="card-body">
                                                  <h5 class="card-title">Card title</h5>
                                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                              </div>
                                        </div>
                                        <!-- end col-3 -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- dropdown-mega-menu.// -->
                            </li>

                            <li class="nav-item dropdown has-megamenu">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    Mega menu 2
                                </a>
                                <div class="dropdown-menu megamenu" role="menu">
                                    <div class="row g-3">

                                        <div class="col-lg-3 col-6">
                                            <div class="card" style="width: 18rem;">
                                                <img class="card-img-top" src="..." alt="Card image cap">
                                                <div class="card-body">
                                                  <h5 class="card-title">Card title</h5>
                                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                              </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-lg-3 col-6">
                                            <div class="card" style="width: 18rem;">
                                                <img class="card-img-top" src="..." alt="Card image cap">
                                                <div class="card-body">
                                                  <h5 class="card-title">Card title</h5>
                                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                              </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="card" style="width: 18rem;">
                                                <img class="card-img-top" src="..." alt="Card image cap">
                                                <div class="card-body">
                                                  <h5 class="card-title">Card title</h5>
                                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                              </div>
                                        </div>
                                        <!-- end col-3 -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- dropdown-mega-menu.// -->
                            </li>

                            <li class="nav-item dropdown has-megamenu">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    Mega menu 3
                                </a>
                                <div class="dropdown-menu megamenu" role="menu">
                                    <div class="row g-3">
                                        <div class="col-lg-3 col-6">
                                            <div class="card" style="width: 18rem;">
                                                <img class="card-img-top" src="..." alt="Card image cap">
                                                <div class="card-body">
                                                  <h5 class="card-title">Card title</h5>
                                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                              </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-lg-3 col-6">
                                            <div class="card" style="width: 18rem;">
                                                <img class="card-img-top" src="..." alt="Card image cap">
                                                <div class="card-body">
                                                  <h5 class="card-title">Card title</h5>
                                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                              </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-lg-3 col-6">
                                            <div class="card" style="width: 18rem;">
                                                <img class="card-img-top" src="..." alt="Card image cap">
                                                <div class="card-body">
                                                  <h5 class="card-title">Card title</h5>
                                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                              </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="card" style="width: 18rem;">
                                                <img class="card-img-top" src="..." alt="Card image cap">
                                                <div class="card-body">
                                                  <h5 class="card-title">Card title</h5>
                                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                              </div>
                                        </div>
                                        <!-- end col-3 -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- dropdown-mega-menu.// -->
                            </li>


                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Menu item </a>
                            </li>
                            {{-- {{ App::getLocale() }} --}}
                            <li class="nav-item dropdown">
                                @if (App::getLocale() == 'fr')
                                    <a class="nav-link btn btn-dark" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
                                        French
                                    </a>
                                @else
                                <a class="nav-link btn btn-dark" href="{{ LaravelLocalization::getLocalizedURL('fr') }}">
                                    ????????
                                </a>
                                @endif

                            </li>
                        </ul>
                    </div>
                    <!-- navbar-collapse.// -->
                </div>
                <!-- container-fluid.// -->
            </nav>
            <!-- ============= COMPONENT END// ============== -->
        </div>
        <!-- container //  -->
    </body>
</html>
