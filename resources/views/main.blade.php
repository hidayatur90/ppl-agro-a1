<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/home.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <title>Rodicord</title>
    </head>
    <body>
        <div class="body-head">
            <div class="container-fluid px-4 px-lg-5 h-100">
                <div class="logo">
                    <a href="/"><img src="assets/img/Rodicord-logo.png" height="50" alt="Logo-Rodicord"></a>
                </div>
                <div class="row gx-4 gx-lg-5 h-100">
                    <div class="content lg-6">
                        <div class="col-lg-6 align-self-end">
                            <h1 class="text-white">BronkCoffee</h1>
                        </div>
                        <div class="col-lg-6 align-self-baseline">
                            <p class="text-white mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                        </div>
                        <div class="btn">
                            <a type="button" class="btn btn-success mx-3" href="/login">Login</a>
                            <a type="button" class="btn btn-outline-success text-white" href="#about">Tentang Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="page-section" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Rodicord</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    </div>
                </div>
            </div>
            @include('partials.footer')
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>