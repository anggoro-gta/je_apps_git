<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="<?= base_url(); ?>/icon/data.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maintenance</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="../../maintenance_assets/css/mdb.min.css" />
</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Intro settings -->
        <style>
            /* Default height for small devices */
            #intro {
                height: 600px;
                /* Margin to fix overlapping fixed navbar */
                margin-top: 58px;
            }

            @media (max-width: 991px) {
                #intro {
                    /* Margin to fix overlapping fixed navbar */
                    margin-top: 45px;
                }
            }
        </style>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand" target="_blank" href="https://mdbootstrap.com/docs/standard/">
                    <img src="#" height="16" alt="" loading="lazy" style="margin-top: -3px;" />
                </a>
                <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample01">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav d-flex flex-row">
                        <!-- Icons -->
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="#" rel="nofollow" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="#" rel="nofollow" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="#" rel="nofollow" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="#" rel="nofollow" target="_blank">
                                <i class="fab fa-github"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->

        <!-- section isinya disini -->
        <?= $this->renderSection('content'); ?>
        <!-- section isinya disini -->
    </header>
    <!--Main Navigation-->


    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2024 Copyright:
        <a class="text-dark" href="#">Bappeda Kab. Kediri</a>
    </div>
    <!-- Copyright -->

    <!-- Time Counter -->
    <script type="text/javascript">
        // Set the date we're counting down to
        var countDownDate = new Date();
        countDownDate.setDate(countDownDate.getDate() + 1);

        // Update the count down every 1 second
        var x = setInterval(function() {
            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById('time-counter').innerHTML =
                days + 'd ' + hours + 'h ' + minutes + 'm ' + seconds + 's ';

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById('time-counter').innerHTML = 'EXPIRED';
            }
        }, 1000);
    </script>
    <!-- MDB -->
    <script type="text/javascript" src="../../maintenance_assets/js/mdb.umd.min.js"></script>
</body>

</html>