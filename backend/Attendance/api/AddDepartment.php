<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

include_once('../model/Department.php');

$department_model = new Department();

$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$faculty_id = isset($_POST['faculty_id']) ? trim($_POST['faculty_id']) : '';

if (empty($name) || empty($faculty_id)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Department name and Faculty ID cannot be empty"]);
    exit();
}

$department_model->addDepartment($name, $faculty_id);

http_response_code(201);
echo json_encode(["status" => "success", "message" => "Department added successfully"]);
