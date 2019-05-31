<?php
class person {
private $name;
private $surname;
private $room;


    public function __construct($name,$surname,$room)
    {
        $this->name = $name;
        $this->surname=$surname;
        $this->room=$room;

    }
    public function getRoom()
    {
        return $this->room;
    }
    public function setName( $name) {
        $this->name = $name;
        return $this;
    }
    public function setRoom($room)
    {
        $this->room = $room;
    }
public function getName() {
return $this->name;
}


public function getSurname() {
return $this->surname;
}

public function setSurname($surname) {
$this->surname = $surname;
}
}
?>