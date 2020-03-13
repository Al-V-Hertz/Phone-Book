<?php
    require "query_stmt.php";
    class Phonebook extends Statement{
        function crud($mode, $name, $num, $id){
            if( $mode == "insert"){
                $this->add_contact($name, $num);
            }else if($mode == "update"){
                $this->upd_contact($name, $num, $id);
            }else if($mode == "delete"){
                $this->del_contact($name, $num, $id);
            }
            echo $name." with contact number: ".$num;
        }
    }
$pb = new Phonebook;
$pname = $_POST['name'];
$pmode = $_POST["mode"];
$pnum =  $_POST['num'];
$pid = $_POST['id'];
$pb->crud($pmode, $pname, $pnum, $pid);
?>