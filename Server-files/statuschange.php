<?php
#add your database username and password
$user="enterusername";
$password="enterpassword";
$database="computer_availability";

#unless the computers name was empty
if($_POST['workstation'] != ""){
        $workstation = strtoupper($_POST['workstation']);
}
else{ #build the computer's name from the host

$host_domain = strstr($_POST['host'], '.');
        $workstation = strtoupper(str_replace($host_domain, '', $_POST['host']));
}

#connect to the database
$DB = mysql_connect('localhost', $user, $password);
@mysql_select_db($database) or die("Unable to select database");

#get the computer's row based on it's name
$checkQuery = "SELECT computer_name FROM compstatus WHERE computer_name = '".$workstation."'";
$result = mysql_query($checkQuery);

#if we find a computer update it's status
if(mysql_numrows($result)>0){
        $query="UPDATE `compstatus` SET status = '".$_POST['status']."' WHERE computer_name = '".$workstation."'";
        mysql_query($query) or die(mysql_error());
}
else
{
        $query="INSERT INTO compstatus(computer_name,status,computer_type,configuration,floor,left_pos,top_pos) VALUES('".$workstation."','".$_POST['status']."','".$_POST['computertype']."', '".$_POST['configuration']."' , '".$_POST['floor']."'  ,'".$_POST['left_pos']."' , '".$_POST['top_pos']."')";
        mysql_query($query) or die(mysql_error());
}



mysql_close($DB);

?>
