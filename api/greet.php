<?php

header("Content-Type: application/json");

$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : "Guest";

$response = [
    "status" => "Success",
    "message" => "Welcome, $name! 🎉",
    "course" => "Mini API Project"
];

echo json_encode($response, JSON_PRETTY_PRINT);

?>