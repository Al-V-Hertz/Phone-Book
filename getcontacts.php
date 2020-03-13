<?php
require "connection.php";
class Getcontacts extends Connection{
    function retrieve(){
         //select
        $sel ="SELECT * FROM tbl_contacts";
        $result=$this->connect()->query($sel);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr><td><input class= 'recid' type='hidden' value=".$row["id"]."><input type='text' pattern='[a-zA-Z][a-zA-Z ]{2,20}' class='recname' value =\"".$row["person"]."\"></td>
                <td><input type='tel' pattern='[0-9]{11,11}' class ='recnum' value =".$row["contact"]."></td>
                <td><button class='edit'>e</button><button class='del'>&times;</button></td><tr>";
            }
        }
    }
}
$gn = new Getcontacts;
$gn->retrieve();
?>