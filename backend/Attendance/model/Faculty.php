<?php
include_once("../db/Connection.php");
include_once("../trait/BasicOperation.php");


class Faculty extends Connection
{

    use BasicOperation;

    public function __construct()
    {
        parent::__construct();
    }

    public function getFaculty()
    {
        return  $this->getAllRecords('faculties');
    }

    public function addFaculty(string $faculty_name)
    {
        return $this->insertFaculty($faculty_name);
    }

    public function editFaculty($faculty_name, $faculty_id)
    {

        return $this->updateFaculty($faculty_name, $faculty_id);
    }
}

