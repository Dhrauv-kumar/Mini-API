<?php

header("Content-Type: application/json");

$response = [
    "tips" => [
        "Study Daily 📖",
        "Practice Coding 💻",
        "Take Notes 📝",
        "Revise Regularly 🔄",
        "Never Give Up 🚀"
    ]
];

echo json_encode($response, JSON_PRETTY_PRINT);

?>