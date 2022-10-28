<?php
include  "dhb.classes.php";
class EditProfile extends Dbh
{
    public function getProfileById($id)
    {
        $sql = "SELECT * FROM user WHERE id = :id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(':id' => $id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateProfile($id, $email, $voornaam, $tussenvoegsel, $achternaam)
    {
        $sql = "UPDATE user SET email=:email, voornaam=:voornaam, tussenvoegsel=:tussenvoegsel, achternaam=:achternaam WHERE id=:id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(':id' => $id, ':email' => $email, ':voornaam' => $voornaam,
             ':tussenvoegsel' => $tussenvoegsel, ':achternaam' => $achternaam ));
        return true;
    }
}