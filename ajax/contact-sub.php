<?php

header('Content-Type: application/json');

include('../include/config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if($conn->connect_error){

    echo json_encode([
        "status" => "error",
        "message" => "Database connection failed"
    ]);

    exit;
}

$full_name =
trim($_POST['full_name'] ?? '');

$email =
trim($_POST['email'] ?? '');

$phone =
trim($_POST['phone'] ?? '');

$message =
trim($_POST['message'] ?? '');

$full_name =
mysqli_real_escape_string(
    $conn,
    $full_name
);

$email =
mysqli_real_escape_string(
    $conn,
    $email
);

$phone =
mysqli_real_escape_string(
    $conn,
    $phone
);

$message =
mysqli_real_escape_string(
    $conn,
    $message
);

if(
    empty($full_name) ||
    empty($email) ||
    empty($phone) ||
    empty($message)
){

    echo json_encode([
        "status" => "error",
        "message" => "All fields are required"
    ]);

    exit;
}

if(
    !preg_match(
        "/^[a-zA-Z ]+$/",
        $full_name
    )
){

    echo json_encode([
        "status" => "error",
        "message" => "Invalid full name"
    ]);

    exit;
}

if(
    !filter_var(
        $email,
        FILTER_VALIDATE_EMAIL
    )
){

    echo json_encode([
        "status" => "error",
        "message" => "Invalid email address"
    ]);

    exit;
}

if(
    !preg_match(
        "/^[0-9]{10}$/",
        $phone
    )
){

    echo json_encode([
        "status" => "error",
        "message" => "Invalid phone number"
    ]);

    exit;
}

if(strlen($message) < 10){

    echo json_encode([
        "status" => "error",
        "message" => "Message too short"
    ]);

    exit;
}

$created_at =
date("Y-m-d H:i:s");

$query = "
INSERT INTO contact_inquiries
(
    full_name,
    email,
    phone,
    message,
    created_at
)
VALUES
(
    '$full_name',
    '$email',
    '$phone',
    '$message',
    '$created_at'
)
";

$insert =
mysqli_query(
    $conn,
    $query
);

if(!$insert){

    echo json_encode([
        "status" => "error",
        "message" => "Database insert failed"
    ]);

    exit;
}

try{

    $mail =
    new PHPMailer(true);

    $mail->isSMTP();

    $mail->Host =
    'smtp.gmail.com';

    $mail->SMTPAuth =
    true;

    $mail->Username =
    'aditya8858.5@gmail.com';

    $mail->Password =
    'augmpyzpmuasaopl';

    $mail->SMTPSecure =
    PHPMailer::ENCRYPTION_STARTTLS;

    $mail->Port =
    587;

    $mail->setFrom(
        'aditya8858.5@gmail.com',
        'Website Inquiry'
    );

    $mail->addAddress(
        'aditya8858.5@gmail.com'
    );

    $mail->addReplyTo(
        $email,
        $full_name
    );

    $mail->isHTML(true);

    $mail->Subject =
    'New Contact Inquiry';

    $mail->Body = "
    <div style='
        font-family:Arial;
        max-width:600px;
        margin:auto;
        background:#f5f5f5;
        padding:30px;
        border-radius:20px;
    '>

        <h2>
            New Contact Inquiry
        </h2>

        <p>
            <strong>Name:</strong>
            {$full_name}
        </p>

        <p>
            <strong>Email:</strong>
            {$email}
        </p>

        <p>
            <strong>Phone:</strong>
            {$phone}
        </p>

        <p>
            <strong>Message:</strong>
            <br>
            {$message}
        </p>

        <p>
            <strong>Date:</strong>
            {$created_at}
        </p>

    </div>
    ";

    $mail->send();

    $userMail =
    new PHPMailer(true);

    $userMail->isSMTP();

    $userMail->Host =
    'smtp.gmail.com';

    $userMail->SMTPAuth =
    true;

    $userMail->Username =
    'aditya8858.5@gmail.com';

    $userMail->Password =
    'augmpyzpmuasaopl';

    $userMail->SMTPSecure =
    PHPMailer::ENCRYPTION_STARTTLS;

    $userMail->Port =
    587;

    $userMail->setFrom(
        'aditya8858.5@gmail.com',
        'Website Team'
    );

    $userMail->addAddress(
        $email
    );

    $userMail->isHTML(true);

    $userMail->Subject =
    'Thank You For Contacting Us';

    $userMail->Body = "
    <div style='
        font-family:Arial;
        max-width:600px;
        margin:auto;
        background:#f5f5f5;
        padding:40px;
        border-radius:20px;
    '>

        <h2>
            Hello {$full_name}
        </h2>

        <p>
            Thank you for contacting us.
        </p>

        <p>
            We have received your inquiry
            successfully.
        </p>

        <p>
            Our team will contact
            you shortly.
        </p>

        <br>

        <strong>
            Regards
        </strong>

        <br>

        Website Team

    </div>
    ";

    $userMail->send();

    echo json_encode([
        "status" => "success",
        "message" =>
        "Inquiry submitted successfully"
    ]);

}catch(Exception $e){

    echo json_encode([
        "status" => "error",
        "message" =>
        "Mail Error: " .
        $e->getMessage()
    ]);
}

$conn->close();

?>