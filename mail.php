<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $full_name = strip_tags(trim($_GET["full_name"]));
        $full_name = str_replace(array("\r","\n"),array(" "," "),$full_name);
        $email = filter_var(trim($_GET["email"]), FILTER_SANITIZE_EMAIL);
        $phone = trim($_GET["phone"]);

        if ( empty($full_name)  OR empty($phone) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo "Please complete the form and try again.";
            exit;
        }

        $recipient = "mridulagarwal9196@gmail.com";
        $subject = "New Message on Usha Solar Power from $full_name";

        $email_content = "Name: $full_name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Phone Number:\n$phone\n";

        $email_headers = "From: Yatish Suwalka <$email>";

        if (mail($recipient, $subject, $email_content, $email_headers)) {
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
