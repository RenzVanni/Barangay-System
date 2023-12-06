<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concerns</title>
</head>

<body>
    <div class="concerns" id="concerns">
        <div class="cons">
            <h2>Do you have any concerns?</h2>
        </div>

        <div class="hide swiper swiperConcerns">
            <div class="swiper-wrapper options">
                <div class="swiper-slide card">
                    <img src="./assets/blotter.png" alt="blotter-img" />
                    <p>BLOTTER</p>
                    <?php if(!isset($_SESSION['role'])) { ?>
                    <button class=""><a href="./login_page.php">REPORT</a></button>
                    <?php } else { ?>
                    <button class="report-btn">REPORT</button>
                    <?php }?>
                </div>
                <div class="swiper-slide card">
                    <img src="./assets/complain.png" alt="complain" />
                    <p>COMPLAIN</p>
                    <?php if(!isset($_SESSION['role'])) { ?>
                    <button class=""><a href="./login_page.php">REPORT</a></button>
                    <?php } else { ?>
                    <button class="report-btn">REPORT</button>
                    <?php }?>
                </div>
                <div class="swiper-slide card">
                    <img src="./assets/awareness.png" alt="awareness-img" />
                    <p>AWARENESS</p>
                    <?php if(!isset($_SESSION['role'])) { ?>
                    <button class=""><a href="./login_page.php">REPORT</a></button>
                    <?php } else { ?>
                    <button class="report-btn">REPORT</button>
                    <?php }?>
                </div>
            </div>

            <img class="swiper-button-prev" src="./assets/arrow-preview.png" alt="arrow-preview" />

            <img class="swiper-button-next" src="./assets/arrow-next.png" alt="arrow-next" />
            <div class="swiper-pagination"></div>
        </div>
    </div>
</body>

</html>