<?php 
    $query = "SELECT * FROM brgy_information";
    $result = $conn->query($query);
	$row = $result->fetch_assoc();

	if($row){
		$province_name = $row['province_name'];
		$brgy_name 		= $row['brgy_name'];
		$municipality_logo 	= $row['municipality_logo'];
		$town_name	= $row['town_name'];
		$tel_no =  $row['tel_no'];
		$brgy_logo		= $row['brgy_logo'];
		$header_image		= $row['header_image'];
		$mission		= $row['mission'];
		$vision		= $row['vision'];
		$historicalBackground		= $row['historical_background'];
		$email		= $row['email'];
		$contactNo		= $row['contact_no'];
		$addressNo		= $row['address_no'];
		$addressStreet		= $row['address_street'];
		$addressSubdi		= $row['address_subdi'];
		$openTime		= $row['open_time'];
		$closeTime		= $row['close_time'];
		$officials_image		= $row['historicalBackground_image'];
	}
$openTimeStamp = strtotime($openTime);
$formattedOpenTime = date('H:i', $openTimeStamp);

$closeTimeStamp = strtotime($closeTime);
$formattedCloseTime = date('H:i', $closeTimeStamp);

	$pos_q = "SELECT * FROM tblposition ORDER BY `order` ASC";
    $pos_r = $conn->query($pos_q);

    $position = array();
	while($row = $pos_r->fetch_assoc()){
		$position[] = $row; 
	}

	$chair_q = "SELECT * FROM tblchairmanship";
	$res_q = $conn->query($chair_q);

	$chair = array();
	while($row = $res_q->fetch_assoc()){
		$chair[] = $row; 
	}
    
?>