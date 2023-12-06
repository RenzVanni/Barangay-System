<?php
function getNewCertificates($conn) {
    // Fetch new certificates from tables like idfom, brgyclearance, certoflbr, etc.
    $sql = "SELECT id, applicant_fname, applicant_mname, applicant_lname, date_requested, 'tbl_idform' AS source FROM tbl_idform WHERE seen = 'unread'
            UNION
            SELECT id, applicant_fname, applicant_mname, applicant_lname, date_requested, 'tbl_brgyclearance' AS source FROM tbl_brgyclearance WHERE seen = 'unread'
            UNION
            SELECT id, applicant_fname, applicant_mname, applicant_lname, date_requested, 'tbl_ecertificate' AS source FROM tbl_ecertificate WHERE seen = 'unread'
            UNION
            SELECT id, applicant_fname, applicant_mname, applicant_lname, date_requested, 'tbl_certofindigency' AS source FROM tbl_certofindigency WHERE seen = 'unread'
            UNION
            SELECT id, applicant_fname, applicant_mname, applicant_lname, date_requested, 'tbl_certoflbr' AS source FROM tbl_certoflbr WHERE seen = 'unread'
            ORDER BY date_requested DESC"; // Adjust the query based on your tables and criteria

    $result = $conn->query($sql);

    // Check if there are new certificates
    if ($result->num_rows > 0) {
        // Fetch the results as an array
        $certificates = array();
        while ($row = $result->fetch_assoc()) {
            $certificates[] = $row;
        }

        return $certificates;
    } else {
        return array();
    }
}


function markCertificateAsRead($conn, $source, $id) {
    $source = $conn->real_escape_string($source);
    $id = (int)$id;

    // Update the status of the specific certificate to mark it as read
    $sql = "UPDATE $source SET seen = 'read' WHERE id = $id AND seen = 'unread'";
    
    // Execute the query
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error updating record: " . $conn->error;
        return false;
    }
}

// Fetch new certificates
$newCertificates = getNewCertificates($conn);

// Display new certificates
foreach ($newCertificates as $certificate) {
        echo '<div class="one-notif clickable-notification" data-id="' . $certificate['id'] . '" data-source="' . $certificate['source'] . '">
            <div class="row_notif">
                <div class="left_notif">
                    <img src="icons/request.png" alt="">
                </div>
                <div class="right_notif">
                    <div class="account_name">' . $certificate['applicant_fname'] . '</div>
                    <div class="request">';
                            // Check the source and display the appropriate text
                    if ($certificate['source'] === 'tbl_idform') {
                        echo 'Identification Form';
                    } else if ($certificate['source'] === 'tbl_brgyclearance') {
                        echo 'Barangay Clearance';
                    } else if ($certificate['source'] === 'tbl_ecertificate') {
                        echo 'Endorsement Certificate';
                    } else if ($certificate['source'] === 'tbl_certoflbr') {
                        echo 'Certificate of Late Birth Registration';
                    } else if ($certificate['source'] === 'tbl_certofindigency') {
                        echo 'Certificate of Indigency';
                    }
                    else {
                        echo $certificate['source']; // Display the source name if not tbl_idform
                    }
                    echo '</div>
                    <div class="time">' . $certificate['date_requested'] . '</div>
                </div>
            </div>
            <div class="underline"></div>
        </div>';
}

// Mark certificates as read after displaying


?>