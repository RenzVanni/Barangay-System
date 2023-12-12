<?php
require("../server/server.php");
require "./vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;

// Fetch data from database
$query = "SELECT `taxpayer_fname`, `taxpayer_mname`, `taxpayer_lname`, `taxpayer_suffix`, `business_name`, `house_no`, `street`, `subdivision`, `business_status` FROM tbl_business";
if (!$result = $conn->query($query)) {
    exit($conn->error);
}

$users = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set title
$title = "BARANGAY ZONE 4";
$sheet->setCellValue('A1', $title);

$subTitle = "LIST OF Business";
$sheet->setCellValue('A2', $subTitle);

// Optional: Style the title
$sheet->getStyle('A1')->getFont()->setBold(true);
$sheet->getStyle('A1')->getFont()->setSize(14);

$sheet->getStyle('A2')->getFont()->setBold(true);
$sheet->getStyle('A2')->getFont()->setSize(14);

// Adjust rows for headers and data because of the new title row
$headersRow = 4; // Starting the headers on the third row
$dataStartRow = $headersRow + 1; // Data starts right after the headers

// Set header
$headers = ['Taxpayer Firstname', 'Taxpayer Middlename', 'Taxpayer Lastname', 'Taxpayer Suffix', 'Business Name', 'House_no', 'Street', 'Subdivision', 'Business Status'];
$sheet->fromArray($headers, NULL, 'A' . $headersRow);

// Populate data
$sheet->fromArray($users, NULL, 'A' . $dataStartRow);

// Style borders:
$lastRow = count($users) + $dataStartRow - 1; // Considering the shifted start for the data
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
        ],
    ],
];
$sheet->getStyle('A' . $headersRow . ':R' . $lastRow)->applyFromArray($styleArray); // Adjust the range based on the number of columns and rows

// Send as a downloadable file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Residents.xlsx"');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
 ?>