<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$userDatabase = [
    "101" => [
        "username" => "keshav_12",
        "device_id" => "ABCD1234XYZ",
       "login_time" => date("h:i A"),        
        "login_date" => date("Y-m-d"),         

        "country_code" => "IN",
        "user" => [
            "age" => 23,
            "name" => "Keshav Agarwal",
            "photo" => "https://example.com/pic.jpg",
            "phone" => "+91 9876543210",
            "address" => "New Delhi, India"
        ]
    ]
];

$id = $_GET["id"] ?? null;

if (!$id) {
    echo json_encode(["error" => "Missing id parameter"]);
    exit;
}

if (!isset($userDatabase[$id])) {
    echo json_encode(["error" => "User not found"]);
    exit;
}

$data = $userDatabase[$id];

$response = [
    "loginDetails" => [
        "username" => $data["username"],
        "deviceId" => $data["device_id"],
        "loginTime" => $data["login_time"],
        "loginDate" => $data["login_date"],
        "countryCode" => $data["country_code"]
    ],
    "userDetails" => [
        "age" => $data["user"]["age"],
        "name" => $data["user"]["name"],
        "photo" => $data["user"]["photo"],
        "phone" => $data["user"]["phone"],
        "address" => $data["user"]["address"]
    ],
    "systemDetails" => [
        "currentDate" => date("Y-m-d"),
        "currentSystem" => php_uname()
    ]
];

echo json_encode($response, JSON_PRETTY_PRINT);
?>
