<?php
require "connection.php";
class Suggestion extends Connection{
    function getNames($keyword){
        $query = "SELECT * FROM tbl_contacts WHERE person LIKE '$keyword%'";
        $result = $this->connect()->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr><td><input class= 'recid' type='hidden' value=".$row["id"]."><input type='text' pattern='[a-zA-Z][a-zA-Z ]{2,20}' class='recname' value =\"".$row["person"]."\"></td>
                <td><input type='tel' pattern='^[\S]*$' class ='recnum' value =".$row["contact"]."></td>
                <td><button class='edit'>e</button><button class='del'>&times;</button></td><tr>";
            }
        }
    }
}
$gn = new Suggestion;
$gn->getNames($_POST['key']);
?>