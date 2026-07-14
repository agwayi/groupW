<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

include_once('../model/Faculty.php');

$facultyModel = new Faculty();

$data = json_decode(file_get_contents("php://input"), true);

$faculty_id = isset($data['faculty_id']) ? trim($data['faculty_id']) : '';
$name = isset($data['name']) ? trim($data['name']) : '';

if (empty($faculty_id) || empty($name)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Faculty ID and name cannot be empty"]);
    exit();
}

$updateStatus = $facultyModel->editFaculty($name, $faculty_id);

if ($updateStatus) {
    http_response_code(200);
    echo json_encode(["status" => "success", "message" => "Faculty updated successfully"]);
} else {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Failed to update faculty"]);
}
