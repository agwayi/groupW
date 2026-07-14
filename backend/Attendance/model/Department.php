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

    public function getDepartment()
    {
        return  $this->getAllRecords('departments');
    }

    public function addDepartment($department_name, $faculty_id)
    {
        return $this->insertDepartment($department_name, $faculty_id);
    }

    public function editDepartment($department_name, $faculty_id, $department_id)
    {

        return $this->updateDepartment($department_name, $faculty_id, $department_id);
    }
}
