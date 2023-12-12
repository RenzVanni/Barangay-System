<?php include './server/server.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barangay Management System</title>
    <link rel="stylesheet" href="./frontendScss/styles.css?<?php echo time() ?>" />

    <!-- swiper js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body>


    <?php include "./frontendModel/fetch_brgy_information.php" ?>
    <?php include "./frontendTemplate/message.php" ?>
    <?php include './actives.php' ?>
    <?php include './active_service.php' ?>
    <?php include './active_report.php' ?>
    <?php include './header.php' ?>

    <?php include "./frontend_profile.php" ?>
    <div class="hide home" id="home">
        <div class="context">
            <h1>WELCOME TO <span><?php echo $brgy_name ?></span></h1>
            <p>
                <?= "Camerino Ave, ".$brgy_name. ", Bayan ". $town_name. ", ". $province_name. " Open Hours of Barangay: Monday to Friday (". $formattedOpenTime. " - ". $formattedCloseTime. ") ". $email. " / ". $contactNo?>
            </p>
            <button><a href="#about">ABOUT US</a></button>
        </div>
        <div class="logo">
            <img src="./uploads/logo/<?php echo $municipality_logo ?>" alt="dasma-logo" />
        </div>
    </div>


    <div class="hide zone4">
        <div class="layer1">
            <div class="section1">
                <div class="logo">
                    <img src="./uploads/logo/<?= $brgy_logo ?>" alt="brgy-logo" />
                </div>
            </div>
            <div class="brgy">
                <span>Republic of the Philippines</span>
                <h2>Zone IV Dasmariñas Cavite</h2>
            </div>
        </div>
    </div>

    <div class="hide about" id="about">
        <h2 class="title">ABOUT OUR BARANGAY</h2>
        <h2 class="background">HISTORICAL BACKGROUND</h2>
        <p><?= $historicalBackground ?></p>
        <div class="officials">
            <img src="./uploads/logo/<?= $officials_image ?>" alt="officials" />
        </div>
    </div>

    <div class="hide goal">
        <div class="vision">
            <h2>Vision</h2>
            <p>
                <?= $vision ?>
            </p>
        </div>

        <div class="mission">
            <h2>Mission</h2>
            <p>
                <?= $mission ?>
            </p>
        </div>
    </div>

    <div class="hide brgyInformation">
        <div class="layer1">
            <h2>Location</h2>
            <table>
                <tbody>
                    <tr>
                        <td>Island Group:</td>
                        <td>Luzon</td>
                    </tr>
                    <tr>
                        <td>Region:</td>
                        <td>Calabarzon (Region IV-A)</td>
                    </tr>
                    <tr>
                        <td>Province:</td>
                        <td>Cavite</td>
                    </tr>
                    <tr>
                        <td>City:</td>
                        <td>Dasmarinas</td>
                    </tr>
                    <tr>
                        <td>Coordinates:</td>
                        <td>14.3267, 120.9381 (14° 20' North, 120° 56' East)</td>
                    </tr>
                    <tr>
                        <td>Dasmariñas City hall:</td>
                        <td>270 m</td>
                    </tr>
                    <tr>
                        <td>Approx. Time of travel to City hall:</td>
                        <td>3min</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="layer2">
            <h2>Physical Information</h2>
            <table>
                <tbody>
                    <tr>
                        <td>Total Land Area (in hectares):</td>
                        <td>77.00 Hectares (770,000 sq.m)</td>
                    </tr>
                    <tr>
                        <td>Barangay Category:</td>
                        <td>Urban</td>
                    </tr>
                    <tr>
                        <td>Land Classification:</td>
                        <td>Landlocked</td>
                    </tr>
                    <tr>
                        <td>Barangay Location:</td>
                        <td>Commercial</td>
                    </tr>
                    <tr>
                        <td>Total Population:</td>
                        <td>3,770 (2020 Census)</td>
                    </tr>
                    <tr>
                        <td>Total Number of Household:</td>
                        <td>7,000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php include './services.php' ?>

    <?php include './frontendAnnouncement.php' ?>

    <?php include './frontendAwareness.php' ?>

    <?php include './contact_us.php' ?>

   

    <?php include './hotlines.php' ?>

    <footer>
        <div class="logo">
            <img src="./uploads/logo/<?php echo $brgy_logo ?>" alt="" />
        </div>

        <h2><?= $brgy_name." ".$town_name.", ".$province_name ?></h2>

        <div class="links">
            <h2>
                QUICK LINKS
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#about">ABOUT</a></li>
                    <li><a href="#services">SERVICES</a></li>
                    <li><a href="#frontendAnnouncement">ANNOUNCEMENT</a></li>
                    <li><a href=" #frontendAwareness">Awareness</a></li>
                    <li><a href="#contact-us">Contact Us</a></li>
                </ul>
            </h2>
        </div>

        <div class="com">
            <ul>
                <li>
                    <img src="./assets/location.png" alt="" />
                    <p><?= "Camerino Ave, ".$brgy_name.", Bayan".$town_name.", ".$province_name?></p>
                </li>
                <li>
                    <img src="./assets/email.png" alt="" />
                    <p><?= $email ?></p>
                </li>
                <li>
                    <img src="./assets/telephone.png" alt="" />
                    <p><?= $contactNo ?></p>
                </li>
            </ul>
        </div>
    </footer>


    <div class="copyright">
        <h2>
            Copyright © 2023 by <?= $brgy_name." ".$town_name." ".$province_name ?>. All Rights
            Reserved.
        </h2>
    </div>

    <?php include "./chat.php" ?>


    <script src="./forntendJs//jQuery-3-7-0.js"></script>
    <script src="./forntendJs//app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".servicesSwiper", {
        spaceBetween: 30,
        loop: true,
        centerSlide: 'true',
        grabCursor: 'true',
        fade: 'true',
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            600: {
                slidesPerView: 2,
            },
            900: {
                slidesPerView: 3
            }
        },
    });

    var swiper = new Swiper(".swiperConcerns", {
        spaceBetween: 30,
        loop: true,
        centerSlide: 'true',
        grabCursor: 'true',
        fade: 'true',
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            600: {
                slidesPerView: 2,
            },
            900: {
                slidesPerView: 3,
            },
        },
    });

    var swiper = new Swiper(".swiperAnnouncement", {
        spaceBetween: 30,
        loop: true,
        centerSlide: 'true',
        grabCursor: 'true',
        fade: 'true',
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            600: {
                slidesPerView: 2,
            },
            900: {
                slidesPerView: 3,
            },
        },
    });

    var swiper = new Swiper(".emNumberSwiper", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
    </script>
</body>

</html>