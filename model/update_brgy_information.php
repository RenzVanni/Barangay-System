<?php
include '../server/server.php';

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);


$province = $conn->real_escape_string($_POST['province_name']);
$brgy = $conn->real_escape_string($_POST['barangay_name']);
$town = $conn->real_escape_string($_POST['municipality_name']);
$number = $conn->real_escape_string($_POST['tel_no']);
$city_logo = $_FILES['municipality_logo']['name'];
$brgy_logo = $_FILES['barangay_logo']['name'];
$historicalBackground_image = $_FILES['historicalBackground_image']['name'];
$header_image = $_FILES['header_image']['name'];
$mission = $conn->real_escape_string($_POST['mission']);
$vision = $conn->real_escape_string($_POST['vision']);
$historicalBackground = $conn->real_escape_string($_POST['historicalBackground']);
$email = $conn->real_escape_string($_POST['email']);
$contactNo = $conn->real_escape_string($_POST['contact-number']);
$addressNo = $conn->real_escape_string($_POST['address-no']);
$addressStreet = $conn->real_escape_string($_POST['address-street']);
$addressSubdi = $conn->real_escape_string($_POST['address-subdi']);
$openTime = $conn->real_escape_string($_POST['open-time']);
$closeTime = $conn->real_escape_string($_POST['close-time']);


$targetDirectory = "../uploads/logo/";
$targetCityLogo = $targetDirectory . $city_logo;
$targetBrgyLogo = $targetDirectory . $brgy_logo;
$targetHeaderImage = $targetDirectory . $header_image;
$targetHistoricalBg = $targetDirectory . $historicalBackground_image;

$validCityLogo = !empty($city_logo) && move_uploaded_file($_FILES['municipality_logo']['tmp_name'], $targetCityLogo);
$validBrgyLogo = !empty($brgy_logo) && move_uploaded_file($_FILES['barangay_logo']['tmp_name'], $targetBrgyLogo);
$validHeaderImage = !empty($header_image) && move_uploaded_file($_FILES['header_image']['tmp_name'], $targetHeaderImage);
$validHistoricalBg = !empty($historicalBackground_image) && move_uploaded_file($_FILES['historicalBackground_image']['tmp_name'], $targetHistoricalBg);

if (!empty($brgy) && !empty($town)) {
    $query = "UPDATE brgy_information SET province_name='$province', brgy_name='$brgy', town_name='$town', `tel_no`='$number', `mission`='$mission', `vision`='$vision', `historical_background`='$historicalBackground', `email`='$email', `contact_no`='$contactNo', `address_no`='$addressNo', `address_street`='$addressStreet', `address_subdi`='$addressSubdi', `open_time`='$openTime', `close_time`='$closeTime'";

	if ($validHeaderImage) {
        $query .= ", header_image='$header_image'";
    }
	
    if ($validCityLogo) {
        $query .= ", municipality_logo='$city_logo'";
    }

    if ($validBrgyLogo) {
        $query .= ", brgy_logo='$brgy_logo'";
    }
	if ($validHistoricalBg) {
        $query .= ", historicalBackground_image='$historicalBackground_image'";
    }

    $query .= " WHERE id=1";

    if ($conn->query($query) === true) {
        $_SESSION['message'] = 'Barangay Info has been updated!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Error updating Barangay Info: ' . $conn->error;
        $_SESSION['success'] = 'danger';
    }
} else {
    $_SESSION['message'] = 'Please complete the form!';
    $_SESSION['success'] = 'danger';
}

if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

$conn->close();
?>