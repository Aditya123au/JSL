<?php

header(
    'Content-Type: application/json'
);

include(
    '../include/config.php'
);

$id =
intval(
    $_GET['id']
    ?? 0
);

if($id <= 0){

    echo json_encode([
        "status" => "error",
        "message" =>
        "Invalid inquiry id"
    ]);

    exit;
}

$query =
"DELETE FROM
contact_inquiries
WHERE id = '$id'
LIMIT 1";

$delete =
mysqli_query(
    $conn,
    $query
);

if($delete){

    echo json_encode([
        "status" => "success",
        "message" =>
        "Inquiry deleted successfully"
    ]);

}else{

    echo json_encode([
        "status" => "error",
        "message" =>
        "Failed to delete inquiry"
    ]);
}

$conn->close();

?>