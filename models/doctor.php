<?php
require_once 'BaseModel.php';

class Doctor extends BaseModel
{
    public $name;
    public $about;
    public $photo;
    public $is_active;
    public $user_id;

    protected function getTableName()
    {
        return "doctors";
    }

    protected function addNewRec()
    {
        $param = array(
            ':name' => $this->name,
            ':about' => $this->about,
            ':photo' => $this->photo,
            ':is_active' => $this->is_active,
            ':user_id' => $this->user_id
        );

        return $this->pm->run("INSERT INTO doctors(name, about, photo, is_active, user_id) VALUES (:name, :about, :photo, :is_active, :user_id)", $param);
    }

    protected function updateRec()
    {
        $param = array(
            ':name' => $this->name,
            ':about' => $this->about,
            ':photo' => $this->photo,
            ':is_active' => $this->is_active,
            ':user_id' => $this->user_id,
            ':id' => $this->id
        );

        return $this->pm->run("UPDATE doctors SET name = :name, about = :about, photo = :photo, is_active = :is_active, user_id = :user_id WHERE id = :id", $param);
    }
}
