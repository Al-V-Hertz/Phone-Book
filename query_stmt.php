<?php
require "connection.php";
class Statement extends Connection{
    function add_contact($name, $num){
        //insert
        $query= "INSERT INTO tbl_contacts (person, contact) VALUES('$name', '$num')";
        $res = $this->connect()->query($query);
        return $res;
    }
    function upd_contact($name, $num, $id){
         //update
        $query = "UPDATE tbl_contacts SET person = '$name', contact = '$num' WHERE id = $id";
        $res = $this->connect()->query($query);
        return $res;
    }
      
    function del_contact($name, $num, $id){
        //delete
        $query = "DELETE FROM tbl_contacts WHERE id = $id";
        $res = $this->connect()->query($query);
        return $res;
    }
}
?> 