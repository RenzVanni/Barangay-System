<?php
require __DIR__ . '/vendor/autoload.php';// Adjust the path based on your project structure

// Twilio credentials
$accountSid = 'AC079e7c0abad1a473720b7b5cb1ab5452';
$authToken  = '5753611066612b60b214a0f02cf3a007';
$twilioPhone = '+14352134543'; // Twilio phone number


// Recipient's phone number

// Your Twilio phone number
$fromPhoneNumber = $twilioPhone;

// Message to be sent
    
    $toPhoneNumber = '+639217108178'; // Replace with the recipient's phone number
    $message = $adminMessage;

// Initialize Twilio client
$twilio = new Twilio\Rest\Client($accountSid, $authToken);

// Send SMS
$twilio->messages
    ->create($toPhoneNumber, // to
             [
                 'from' => $fromPhoneNumber,
                 'body' => $message
             ]
    );

echo "SMS sent successfully!";
