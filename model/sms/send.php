<?php

/**
 * Send an SMS message by using Infobip API PHP Client.
 *
 * For your convenience, environment variables are already pre-populated with your account data
 * like authentication, base URL and phone number.
 *
 * Please find detailed information in the readme file.
 */

require '../vendor/autoload.php';

use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;

$BASE_URL = "https://8g44zr.api.infobip.com";
$API_KEY = "a7ab35db126480062788e69b67be281a-2d94e75b-32db-4650-ad8e-873b83d4a9a0";

$SENDER = "InfoSMS";
if($contactNo) {
    if($smsReply) {
        $RECIPIENT = $contactNo; // Original number
        $MESSAGE_TEXT = $adminMessage;
    }
}

// Check if the first two digits are already "63"
if (substr($RECIPIENT, 0, 2) !== "63") {
    // If not, replace the leading zero with "63"
    $RECIPIENT = "63" . substr($RECIPIENT, 1);
}

$configuration = new Configuration(host: $BASE_URL, apiKey: $API_KEY);

$sendSmsApi = new SmsApi(config: $configuration);

$destination = new SmsDestination(
    to: $RECIPIENT
);

$message = new SmsTextualMessage(destinations: [$destination], from: $SENDER, text: $MESSAGE_TEXT);

$request = new SmsAdvancedTextualRequest(messages: [$message]);

try {
    $smsResponse = $sendSmsApi->sendSmsMessage($request);

    echo $smsResponse->getBulkId() . PHP_EOL;

    foreach ($smsResponse->getMessages() ?? [] as $message) {
        echo sprintf('Message ID: %s, status: %s', $message->getMessageId(), $message->getStatus()?->getName()) . PHP_EOL;
    }
} catch (Throwable $apiException) {
    echo("HTTP Code: " . $apiException->getCode() . "\n");
}
