<?php include "./frontendServer/server.php" ?>
<?php
$query =  "SELECT * FROM tbl_announcement";
$result = $conn->query($query);

$announcement = array();
while($row = $result->fetch_assoc()) {
  $announcement[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>
</head>

<body>
    <div class="announcement">
        <div class="announce">
            <h2>Barangay News</h2>
        </div>

        <div class="hide swiper swiperAnnouncement" id="frontendAnnouncement">
            <div class="swiper-wrapper options">
                <?php if(!empty($announcement)) { ?>
                <?php $no=1; foreach($announcement as $row): ?>
                <div class="swiper-slide card">
                    <div class="picture">
                        <img src="./uploads/announcement/<?= $row['image_announcement']?>" alt="image" />
                    </div>
                    <hr>
                    <div class="context">
                        <span><?= $row['date_announcement']?></span>
                        <p>Earthquake Drill</p>
                        <a href="./main_announcement.php?id=<?= $row['id'] ?>">Read more ></a>
                    </div>
                </div>
                <?php $no++; endforeach ?>
                <?php } ?>
            </div>

            <img class="swiper-button-prev" src="./assets/arrow-preview.png" alt="arrow-preview" />

            <img class="swiper-button-next" src="./assets/arrow-next.png" alt="arrow-next" />
            <div class="swiper-pagination"></div>
        </div>
    </div>
</body>

</html>