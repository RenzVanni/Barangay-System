<div class="services" id="services">
    <div class="serve">
        <h2>SERVICES</h2>
    </div>
    <div class="hide swiper servicesSwiper">
        <div class="swiper-wrapper container">
            <div class="swiper-slide card">
                <img src="./assets/stamp.png" alt="stamp" />
                <p>IDENTIFICATION FORM</p>
                <?php if(!isset($_SESSION['role'])) { ?>
                <button class=""><a href="./login_page.php">REQUEST</a></button>
                <?php } else { ?>
                <button class="service-btn">REQUEST</button>
                <?php }?>
            </div>
            <div class="swiper-slide card">
                <img src="./assets/stamp.png" alt="stamp" />
                <p>BARANGAY CLEARANCE</p>
                <?php if(!isset($_SESSION['role'])) { ?>
                <button class=""><a href="./login_page.php">REQUEST</a></button>
                <?php } else { ?>
                <button class="service-btn">REQUEST</button>
                <?php }?>
            </div>
            <div class="swiper-slide card">
                <img src="./assets/stamp.png" alt="stamp" />
                <p>ENDORSEMENT CERTIFICATE</p>
                <?php if(!isset($_SESSION['role'])) { ?>
                <button class=""><a href="./login_page.php">REQUEST</a></button>
                <?php } else { ?>
                <button class="service-btn">REQUEST</button>
                <?php }?>
            </div>
            <div class="swiper-slide card">
                <img src="./assets/stamp.png" alt="stamp" />
                <p>CERTIFICATE OF INDIGENCY</p>
                <?php if(!isset($_SESSION['role'])) { ?>
                <button class=""><a href="./login_page.php">REQUEST</a></button>
                <?php } else { ?>
                <button class="service-btn">REQUEST</button>
                <?php }?>
            </div>
            <div class="swiper-slide card">
                <img src="./assets/stamp.png" alt="stamp" />
                <p>CERTIFICATE OF LATE BIRTH REGISTRATION</p>
                <?php if(!isset($_SESSION['role'])) { ?>
                <button class=""><a href="./login_page.php">REQUEST</a></button>
                <?php } else { ?>
                <button class="service-btn">REQUEST</button>
                <?php }?>
            </div>
            <div class="swiper-slide card">
                <img src="./assets/stamp.png" alt="stamp" />
                <p>BUSINESS CLEARANCE</p>
                <?php if(!isset($_SESSION['role'])) { ?>
                <button class=""><a href="./login_page.php">REQUEST</a></button>
                <?php } else { ?>
                <button class="service-btn">REQUEST</button>
                <?php }?>
            </div>
        </div>
        <img class="swiper-button-prev" src="./assets/arrow-preview.png" alt="arrow-preview" />
        <img class="swiper-button-next" src="./assets/arrow-next.png" alt="arrow-next" />
        <div class="swiper-pagination"></div>
    </div>
</div>