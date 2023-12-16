<?php
require_once __DIR__ . '/vendor/autoload.php';

// Connect to Gmail via IMAP
$mailbox = new PhpImap\Mailbox('{imap.gmail.com:993/imap/ssl}INBOX', 'your-email@gmail.com', 'your-password', __DIR__);

// Get all unread emails
$mailsIds = $mailbox->searchMailbox('UNSEEN');

foreach ($mailsIds as $mailId) {
    // Get email data
    $email = $mailbox->getMail($mailId);

    // Extract relevant information
    $sender = $email->fromAddress;
    $subject = $email->subject;
    $content = $email->textPlain;
    $timestamp = strtotime($email->date);

    // Display information (you can save to the database here)
    echo "Sender: $sender\n";
    echo "Subject: $subject\n";
    echo "Content:\n$content\n";
    echo "Timestamp: " . date('Y-m-d H:i:s', $timestamp) . "\n";
    echo "-------------------------\n";
}

    // Close the IMAP stream
    imap_close($mailbox);
?>
