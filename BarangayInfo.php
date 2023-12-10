<?php include './server/server.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Information</title>
    <!-- Bootstrap 5 CDN Link -->


    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->
    <link rel="stylesheet" href="style3.css ">
    <link rel="stylesheet" href="style4.css ">
    <link rel="stylesheet" href="sidenav.css ">
    <link rel="stylesheet" href="modal.css ">
    <link rel="stylesheet" href="./style/generateCert.css">
    <script src="sidebar.js "></script>



</head>

<body>
    <?php include './model/fetch_brgy_role.php' ?>
    <?php include './actives/active_restore.php' ?>
    <?php include './actives/active_account.php' ?>
    <?php include './sidebar.php' ?>


    <div class="home_residents">
        <div class="first_layer">
            <p>Barangay Information</p>
           
        </div>

        <form action="./model/update_brgy_information.php" method="post" enctype="multipart/form-data">
            <div class="barangay-body">
                <div class="barangay-layer1">
                    <div class="left-layer">
                        <div class="barangay-input">
                            <label for="barangay-name">Barangay Name</label>
                            <input type="text" name="barangay_name" id="barangay-name" value="<?= $brgy_name?>">
                        </div>
                        <div class="barangay-input">
                            <label for="municipality-name">Municipality Name</label>
                            <input type="text" name="municipality_name" id="municipality-name"
                                value="<?= $town_name ?>">
                        </div>
                        <div class="barangay-input">
                            <label for="province-name">Province Name</label>
                            <input type="text" name="province_name" id="municipality-name"
                                value="<?= $province_name ?>">
                        </div>
                        <div class="barangay-input">
                            <label for="email-name">Email</label>
                            <input type="text" name="email" id="email-name" value="<?= $email?>">
                        </div>
                        <div class="barangay-input">
                            <label for="contact-number">Contact Number</label>
                            <input type="text" name="contact-number" id="contact-number" value="<?= $contactNo ?>">
                        </div>
                        <div class="barangay-input">
                            <label for="address-name">Address</label>
                            <div class="address-cont-brgy">
                                <input type="text" name="address-no" id="address-no" placeholder="House no."
                                    value="<?= $addressNo ?>">
                                <input type="text" name="address-street" id="address-street" placeholder="Street"
                                    value="<?= $addressStreet ?>">
                                <input type="text" name="address-subdi" id="address-subdi" placeholder="Subdivision"
                                    value="<?= $addressSubdi ?>">
                            </div>
                        </div>
                    </div>

                    <div class="right-layer">
                        <div class="office-hrs-cont">
                            <p>Office Hours</p>
                            <div class="office-rect">
                                <div class="openClose-cont">
                                    <div class="input-time">
                                        <label for="open-time">Open at</label>
                                        <input type="time" id="open-time" name="open-time"
                                            value="<?= $formattedOpenTime ?>">
                                    </div>
                                    <div class="input-time">
                                        <label for="close-time">Close at</label>
                                        <input type="time" id="close-time" name="close-time"
                                            value="<?= $formattedCloseTime ?>">
                                    </div>
                                </div>
                                <div class="days-cont">
                                    <input type="checkbox" id="sun" name="sun">
                                    <label for="sun">Sun</label>
                                    <input type="checkbox" id="mon" name="mon">
                                    <label for="mon">Mon</label>
                                    <input type="checkbox" id="tue" name="tue">
                                    <label for="tue">Tue</label>
                                    <input type="checkbox" id="wed" name="wed">
                                    <label for="wed">Wed</label>
                                    <input type="checkbox" id="thu" name="thu">
                                    <label for="thu">Thu</label>
                                    <input type="checkbox" id="fri" name="fri">
                                    <label for="fri">Fri</label>
                                    <input type="checkbox" id="sat" name="sat">
                                    <label for="sat">Sat</label>
                                </div>
                            </div>
                        </div>
                        <div class="img-cont">
                            <div class="left-img">
                                <label for="imageInput1">Municipality Logo</label>
                                <div id="imagePreview1">
                                    <img src="./uploads/logo/<?= $municipality_logo ?>" alt="Barangay Logo">
                                </div>
                                <input type="file" name="municipality_logo" id="imageInput1" accept="image/*"
                                    onchange="previewImage1()">
                            </div>
                            <div class="right-img">
                                <label for="imageInput2">Barangay Logo</label>
                                <div id="imagePreview2" class="image-preview">
                                    <img src="./uploads/logo/<?= $brgy_logo ?>" alt="Barangay Logo">
                                </div>
                                <input type="file" name="barangay_logo" id="imageInput2" accept="image/*"
                                    onchange="previewImage2()">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="barangay-layer2">
                    <div class="menu-img-cont">
                        <label for="menu-img">Menu Image</label>
                        <div class="menu-center">
                            <div id="MenuPreview" class="image-preview">
                                <img src="./uploads/logo/<?= $header_image ?>" alt="">
                            </div>
                            <input type="file" name="header_image" id="menu-img" accept="image/*"
                                onchange="previewMenu()">
                        </div>
                    </div>

                    <div class="historical-desc">
                        <div class="description-cont">
                            <label for="history-desc">Historical Background Description</label>
                            <img src="/edit.png" id="edit_description" alt="Edit">
                        </div>
                        <div class="history-center">
                            <div class="mb-3">
                                <textarea name="historicalBackground" id="your_summernote" class="form-control"
                                    rows="4"><?= $historicalBackground ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="historical-img">
                        <label for="history-img">Historical Background Image</label>
                        <div id="ImgPreview" class="image-preview">
                            <img src="./uploads/logo/<?= $officials_image ?>" alt="Historical Background Image">
                        </div>
                        <input type="file" name="historicalBackground_image" id="history-img" accept="image/*"
                            onchange="previewHistoryImage()">
                    </div>
                    <div class="MissionVision-cont">
                        <div class="vision-cont">
                            <div class="label-cont">
                                <label for="vision">Vision</label>
                                <img src="/edit.png" id="editVision" alt="">
                            </div>

                            <div class="mb-3">
                                <textarea name="vision" id="your_summernote1" class="form-control"
                                    rows="4"><?= $vision ?></textarea>
                            </div>
                        </div>
                        <div class="mission-cont">
                            <div class="label-cont">
                                <label for="mission">Mission</label>
                                <img src="/edit.png" id="editMission" alt="">
                            </div>

                            <div class="mb-3">
                                <textarea name="mission" id="your_summernote2" class="form-control"
                                    rows="4"><?= $mission?></textarea>
                            </div>
                        </div>


                    </div>

                </div>
            </div>

            <div class="update-Container">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>

    <!-- <div class="modal-editDescription">
        <form action="#" class="formEditDescription" id="formEditDescription">
            <div class="mb-3">
                <label>Big Description</label>
                <textarea name="description" id="your_summernote" class="form-control" rows="4"></textarea>
            </div>
        </form> 
    </div> -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#your_summernote").summernote();
        $('.dropdown-toggle').dropdown();
    });
    </script>
    <!-- //Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#your_summernote1").summernote();
        $('.dropdown-toggle').dropdown();
    });
    </script>
    <!-- //Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#your_summernote2").summernote();
        $('.dropdown-toggle').dropdown();
    });
    </script>
</body>

</html>

<script>
function previewImage1() {
    var input = document.getElementById('imageInput1');
    var preview = document.getElementById('imagePreview1');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var image = document.createElement('img');
            image.src = e.target.result;
            preview.innerHTML = '';
            preview.appendChild(image);
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.innerHTML = '';
    }
}

function previewImage2() {
    var input = document.getElementById('imageInput2');
    var preview = document.getElementById('imagePreview2');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var image = document.createElement('img');
            image.src = e.target.result;
            preview.innerHTML = '';
            preview.appendChild(image);
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.innerHTML = '';
    }
}

function previewMenu() {
    var input = document.getElementById('menu-img');
    var preview = document.getElementById('MenuPreview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var image = document.createElement('img');
            image.src = e.target.result;
            preview.innerHTML = '';
            preview.appendChild(image);
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.innerHTML = '';
    }
}

function previewHistoryImage() {
    var input = document.getElementById('history-img');
    var preview = document.getElementById('ImgPreview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var image = document.createElement('img');
            image.src = e.target.result;
            preview.innerHTML = '';
            preview.appendChild(image);
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.innerHTML = '';
    }
}


const editdescription = document.getElementById('edit_description');
const modaleditDescription = document.querySelector('.modal-editDescription');

editdescription.addEventListener('click', function(event) {
    event.preventDefault();
    modaleditDescription.style.display = 'block';
});

// closeButton.addEventListener('click', function() {
//     modal.style.display = 'none';
// });
</script>