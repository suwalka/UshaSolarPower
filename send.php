<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $emailp = filter_var(trim($_GET["emailp"]), FILTER_SANITIZE_EMAIL);

//        if ( empty($name)  OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
//            http_response_code(400);
//           echo "Please complete the form and try again.";
//            exit;
//        }

        $recipient = "mridulagarwal9196@gmail.com";
        $subject = "New Suscriber on Usha Solar Power from $emailp";

        $email_content .= "Email: $emailp\n\n";

        $email_headers = "From: Yatish Suwalka <tech@spacetangle.com>";

        if (mail($recipient, $subject, $email_content, $email_headers)) {
            http_response_code(200);
            echo "You have successfully subscribed for our latest updates.";
        } else {
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
