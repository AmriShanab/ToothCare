<?php

require_once 'BaseModel.php';

class DoctorAvailable extends BaseModel
{
public $day;
public $session_from;
public $session_to;
public $doctor_id;
public $is_active;

protected function getTableName()
{
    return "doctor_availability";
}

protected function addNewRec()
{
    $availability = array (
        ':day' =>$this->day,
        ':session_from' => $this ->session_from,
        ':session_to' => $this ->session_to,
        ':doctor_id' => $this ->doctor_id,
        ':is_active' => $this ->is_active
    );

    return $this ->pm->run("INSERT INTO " . $this->getTableName() . "(day, session_from, session_to, doctor_id, is_active) values(:day, :session_from,:session_to, :doctor_id, :is_active)", $availability);
}
protected function updateRec()
{
    
    $availability = array (
        ':day' =>$this->day,
        ':session_from' => $this ->session_from,
        ':session_to' => $this ->session_to,
        ':doctor_id' => $this ->doctor_id,
        ':is_active' => $this ->is_active,
        ':id' => $this->id
    );
    return $this->pm->run(
        "UPDATE " . $this->getTableName() . "
        SET 
        day = :day,
        session_from = :session_from,
        session_to = :session_to,
        doctor_id = :doctor_id,
        is_active = :is_active,
        WHERE id = :id",
        $availability
    );
}
}