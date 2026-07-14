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

    public function GetFaculty()
    {
        return  $this->getAllRecords('faculties');
    }

    public function AddFaculty(string $faculty_name)
    {
        // check if it already exist
        $check =  $this->recordExists('faculties', 'name', $faculty_name);
        if ($check) {
            return false;
        }
        return $this->insertFaculty($faculty_name);
    }
    public function EditFaculty(string $faculty_name, string  $faculty_id)
    {

        return $this->updateFaculty($faculty_name, $faculty_id);
    }
}
