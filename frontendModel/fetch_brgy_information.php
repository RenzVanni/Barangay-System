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
date_default_timezone_set('Asia/Manila');

$openTimeStamp = strtotime($openTime);
$formattedOpenTime = date('H:i a', $openTimeStamp);

$closeTimeStamp = strtotime($closeTime);
$formattedCloseTime = date('H:i a', $closeTimeStamp);

if(isset($_SESSION['firstname']) && isset($_SESSION['middlename']) && isset($_SESSION['lastname'])) {
	
	$firstname = $_SESSION['firstname'];
    $middlename = $_SESSION['middlename'];
    $lastname = $_SESSION['lastname'];

// $query1 = "SELECT * FROM tbl_idform
//           JOIN tbl_brgyclearance ON 
// 		  	tbl_idform.applicant_fname = tbl_brgyclearance.applicant_fname
// 			AND tbl_idform.applicant_mname = tbl_brgyclearance.applicant_mname
// 			AND tbl_idform.applicant_lname = tbl_brgyclearance.applicant_lname
//           JOIN tbl_certoflbr ON 
// 		  	tbl_brgyclearance.applicant_fname = tbl_certoflbr.applicant_fname 
// 		  	AND tbl_brgyclearance.applicant_mname = tbl_certoflbr.applicant_mname 
// 		  	AND tbl_brgyclearance.applicant_lname = tbl_certoflbr.applicant_lname 
// 		  WHERE tbl_idform.applicant_fname = '$firstname'
//           AND tbl_idform.applicant_mname = '$middlename'
//           AND tbl_idform.applicant_lname = '$lastname'";

$query1 = "SELECT id, applicant_fname, applicant_mname, applicant_lname, requestor_fname, requestor_mname, requestor_lname, date_requested, status, 'tbl_idform' AS source
			FROM tbl_idform
           WHERE applicant_fname = '$firstname'
           AND applicant_mname = '$middlename'
           AND applicant_lname = '$lastname'
		   AND (status = 'Pending' OR status = 'For Pick-up')
           UNION ALL
           SELECT id, applicant_fname, applicant_mname, applicant_lname, requestor_fname, requestor_mname, requestor_lname, date_requested, status, 'tbl_brgyclearance' AS source
			FROM tbl_brgyclearance
           WHERE applicant_fname = '$firstname'
           AND applicant_mname = '$middlename'
           AND applicant_lname = '$lastname'
		   AND (status = 'Pending' OR status = 'For Pick-up')
		   UNION ALL
			SELECT id, applicant_fname, applicant_mname, applicant_lname, requestor_fname, requestor_mname, requestor_lname, date_requested, status, 'tbl_ecertificate' AS source
			FROM tbl_ecertificate
           WHERE applicant_fname = '$firstname'
           AND applicant_mname = '$middlename'
           AND applicant_lname = '$lastname'
		   AND (status = 'Pending' OR status = 'For Pick-up')
		   UNION ALL
			SELECT id, applicant_fname, applicant_mname, applicant_lname, requestor_fname, requestor_mname, requestor_lname, date_requested, status, 'tbl_certoflbr' AS source
		   	FROM tbl_certoflbr
           WHERE applicant_fname = '$firstname'
           AND applicant_mname = '$middlename'
           AND applicant_lname = '$lastname'
		   AND (status = 'Pending' OR status = 'For Pick-up')
		   UNION ALL
		   	SELECT id, applicant_fname, applicant_mname, applicant_lname, requestor_fname, requestor_mname, requestor_lname, date_requested, status, 'tbl_certofindigency' AS source
		   	FROM tbl_certofindigency
           WHERE applicant_fname = '$firstname'
           AND applicant_mname = '$middlename'
           AND applicant_lname = '$lastname'
		   AND (status = 'Pending' OR status = 'For Pick-up')
		   ORDER BY date_requested DESC";

$result1 = $conn->query($query1);

    // Initialize an array to store the results
$certs = array();

if (!$result1) {
    echo "Error: " . mysqli_error($conn);
} else {
    // Initialize an array to store the results
    $certs = array();

    while ($row = $result1->fetch_assoc()) {
		$certs[] = $row;
        // $idformData = $row['applicant_fname'];
        // $brgyclearanceData = $row['applicant_mname'];
        // $lbrData = $row['applicant_lname'];

        // echo "ID Form Data: " . $idformData . "<br>";
        // echo "Brgy Clearance Data: " . $brgyclearanceData . "<br>";
        // echo "LBR Data: " . $lbrData . "<br>";
    }
}
}


?>