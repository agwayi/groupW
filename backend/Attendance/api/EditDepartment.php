<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT, OPTIONS");


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

include_once('../model/Department.php');

$department_model = new Department();

$data = json_decode(file_get_contents("php://input"), true);

$department_id = isset($data['department_id']) ? trim($data['department_id']) : '';
$name = isset($data['name']) ? trim($data['name']) : '';
$faculty_id = isset($data['faculty_id']) ? trim($data['faculty_id']) : '';

if (empty($department_id) || empty($name) || empty($faculty_id)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Department ID, name, and Faculty ID cannot be empty"]);
    exit();
}

$updateStatus = $department_model->editDepartment($name, $faculty_id, $department_id);

if ($updateStatus) {
    http_response_code(200);
    echo json_encode(["status" => "success", "message" => "Department updated successfully"]);
} else {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Failed to update department"]);
}
