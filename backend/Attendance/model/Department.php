<?php
include_once("../db/Connection.php");
include_once("../trait/BasicOperation.php");


class Department extends Connection
{

    use BasicOperation;

    public function __construct()
    {
        parent::__construct();
    }

    public function GetDepartment()
    {
        return  $this->getAllRecords('departments');
    }

    public function AddDepartment(string $department_name, string $faculty_id)
    {
        //checking if department already exist
        $check =  $this->recordExists('departments', 'name', $department_name);
        if ($check) {
            return false;
        }
        return $this->insertDepartment($department_name, $faculty_id);
    }

    public function EditDepartment(string $department_name, string  $faculty_id, string  $department_id)
    {

        return $this->updateDepartment($department_name, $faculty_id, $department_id);
    }
}
