<?php
        header("refresh: 30;");
?>

<!doctype html>
<html lang="en">
<head>

<title>Computer Availability</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

<script type="text/javascript">
        //insert javascript

</script>

<style type="text/css">

        #counter
        {
                position:relative;

        }
        #over
        {

                max-width:10%;
        }


        #legend
        {
                vertical-align:bottom;
        }

        img
        {
                width:100%;
        }
        .fa
        {
                font-size:10px;
        }

        @media screen and (max-width: 480px) {
        .fa {
                font-size: 10px;
                }
        }
        @media screen and (min-width: 800px) {
        .fa {
                font-size: 20px;
                }
        }



</style>

</head>

<?php
#add your database username and password
$user="enterusername";
$password="enterpassword";
$database="computer_availability";

#connect to the database, I have it as localhost for my case. Might be different for your case. 
$DB = mysql_connect('localhost', $user, $password);
@mysql_select_db($database) or die("Unable to select database");

#$total_pc_results = mysql_query("SELECT * FROM compstatus WHERE computer_type='PC'");
#$avail_pc_results = mysql_query("SELECT * FROM compstatus WHERE status='0' AND computer_type='PC'");
#$pcs = mysql_num_rows($avail_pc_results) . '/' .mysql_num_rows($total_pc_results);

#get the textual data - total numbers and available numbers of MACs
#$total_mac_results = mysql_query("SELECT * FROM compstatus WHERE computer_type='MAC'");
#$avail_mac_results = mysql_query("SELECT * FROM compstatus WHERE status='0' AND computer_type='MAC'");
#$macs = mysql_num_rows($avail_mac_results) . '/' . mysql_num_rows($total_mac_results);

#get all the computer's row of data
#$result = mysql_query("SELECT * FROM compstatus");

#get all the computers on Raynor First Floor
$raynorfirst=mysql_query("SELECT * FROM compstatus WHERE floor='RaynorFirst'");
$first_total_pc_results = mysql_query("SELECT * FROM compstatus WHERE computer_type='PC' AND floor='RaynorFirst'");
$first_avail_pc_results = mysql_query("SELECT * FROM compstatus WHERE status='0' AND computer_type='PC' AND floor='RaynorFirst'");
$firstpcs = mysql_num_rows($first_avail_pc_results) . '/' .mysql_num_rows($first_total_pc_results);
$first_total_mac_results = mysql_query("SELECT * FROM compstatus WHERE computer_type='MAC' AND floor='RaynorFirst'");
$first_avail_mac_results = mysql_query("SELECT * FROM compstatus WHERE status='0' AND computer_type='MAC' AND floor='RaynorFirst'");
$firstmacs = mysql_num_rows($first_avail_mac_results) . '/' . mysql_num_rows($first_total_mac_results);

#get all the computers on Raynor Second Floor
$raynorsecond=mysql_query("SELECT * FROM compstatus WHERE floor='RaynorSecond'");
$second_total_pc_results = mysql_query("SELECT * FROM compstatus WHERE computer_type='PC' AND floor='RaynorSecond'");
$second_avail_pc_results = mysql_query("SELECT * FROM compstatus WHERE status='0' AND computer_type='PC' AND floor='RaynorSecond'");
$secondpcs = mysql_num_rows($second_avail_pc_results) . '/' .mysql_num_rows($second_total_pc_results);
$second_total_mac_results = mysql_query("SELECT * FROM compstatus WHERE computer_type='MAC' AND floor='RaynorSecond'");
$second_avail_mac_results = mysql_query("SELECT * FROM compstatus WHERE status='0' AND computer_type='MAC' AND floor='RaynorSecond'");
$secondmacs = mysql_num_rows($second_avail_mac_results) . '/' . mysql_num_rows($second_total_mac_results);

#get all the computers on Raynor Lower Floor
$raynorlower=mysql_query("SELECT * FROM compstatus WHERE floor='RaynorLower'");
$lower_total_pc_results = mysql_query("SELECT * FROM compstatus WHERE computer_type='PC' AND floor='RaynorLower'");
$lower_avail_pc_results = mysql_query("SELECT * FROM compstatus WHERE status='0' AND computer_type='PC' AND floor='RaynorLower'");
$lowerpcs = mysql_num_rows($lower_avail_pc_results) . '/' .mysql_num_rows($lower_total_pc_results);
$lower_total_mac_results = mysql_query("SELECT * FROM compstatus WHERE computer_type='MAC' AND floor='RaynorLower'");
$lower_avail_mac_results = mysql_query("SELECT * FROM compstatus WHERE status='0' AND computer_type='MAC' AND floor='RaynorLower'");
$lowermacs = mysql_num_rows($lower_avail_mac_results) . '/' . mysql_num_rows($lower_total_mac_results);

#get all the computers on Memorial
$raynormemorial=mysql_query("SELECT * FROM compstatus WHERE floor='Memorial'");
$raynormemorial=mysql_query("SELECT * FROM compstatus WHERE floor='Memorial'");
$memorial_total_pc_results = mysql_query("SELECT * FROM compstatus WHERE computer_type='PC' AND floor='Memorial'");
$memorial_avail_pc_results = mysql_query("SELECT * FROM compstatus WHERE status='0' AND computer_type='PC' AND floor='Memorial'");
$memorialpcs = mysql_num_rows($memorial_avail_pc_results) . '/' .mysql_num_rows($memorial_total_pc_results);
$memorial_total_mac_results = mysql_query("SELECT * FROM compstatus WHERE computer_type='MAC' AND floor='Memorial'");
$memorial_avail_mac_results = mysql_query("SELECT * FROM compstatus WHERE status='0' AND computer_type='MAC' AND floor='Memorial'");
$memorialmacs = mysql_num_rows($memorial_avail_mac_results) . '/' . mysql_num_rows($memorial_total_mac_results);

mysql_close($DB);
?>
<?php
        #PHP function to add icons on the maps
        function addicons($floor)
        {
                        $type=null;
                        $status=null;

                        while($row = mysql_fetch_array($floor))
                        {
                                #check computer status
                                if($row['status']==0)
                                {
                                        $status="green";

                                        #check computer type
                                        if($row['computer_type']=='Mac')
                                        {
                                                $type="fa fa-apple";
                                        }
                                        else
                                        {
                                                $type="fa fa-windows";
                                        }

                                }
                                else
                                {
                                        $status="red";
                                        #check computer type
                                        if($row['computer_type']=='Mac')
                                        {
                                                $type="fa fa-times-circle";
                                        }
                                        else
                                        {
                                                $type="fa fa-times";
                                        }
                                }

                                #error checking
                                if($row['left_pos']==0 && $row['top_pos']==0)
                                {
                                        #don't do anything because you haven't add position for the computer yet in database
                                }
                                else
                                {
                                        #Places icons  on top of background map based on locations of the computer provided from database
                                        echo '<div id= "over " 
                                        <i class="'.$type.'" aria-hidden="true" style="max-width:10%;color:'.$status.';position:absolute;left:'.$row['left_pos'].'%;top:'.$row['top_pos'].'%;"></i>
                                        </div>';
                                }
                        }
        }


        function echoLegend()
        {
                  echo  '<div id="legend">
<i class="fa fa-windows" aria-hidden="true" style="color:green;"></i> PC Available     <i class="fa fa-times" aria-hidden="true" style="color:red;"></i> PC Busy     <i class="fa fa-apple" aria-hidden="true" style="color:green;"></i> Mac Available     <i class="fa fa-times-circle" aria-hidden="true" style="color:red;"></i> Mac Busy
            <br>
                <br>
    </div>';
        }



?>
<body>

<div class="container">


  <h2>Computer Availability</h2>

  <ul class="nav nav-tabs" id="myTab">
    <li class="active"><a data-toggle="tab" href="#home">Raynor First Floor</a></li>
    <li><a data-toggle="tab" href="#menu1">Raynor Second Floor</a></li>
    <li><a data-toggle="tab" href="#menu2">Raynor Lower Level</a></li>
    <li><a data-toggle="tab" href="#menu3">Memorial</a></li>
  </ul>

  <div class="tab-content">



    <div id="home" class="tab-pane fade in  active">
      <h3>Raynor First Floor</h3>
      <p>PC's available: <?php echo $firstpcs; ?> Mac's available: <?php echo $firstmacs; ?></p>
      <?php echoLegend() ?>


         <div id="counter">



                        <?php
                                addicons($raynorfirst);
                        ?>

                <img src="/ComputerAvailability/Images/RaynorFirst.png"  alt="bg" />
        </div>

    </div>





    <div id="menu1" class="tab-pane fade">
      <h3>Raynor Second Floor</h3>
      <p>PC's available: <?php echo $secondpcs; ?> Mac's available: <?php echo $secondmacs; ?></p>
         <?php echoLegend() ?>



         <div id="counter">



                        <?php
                                addicons($raynorsecond);
                        ?>


                <img src="/ComputerAvailability/Images/RaynorSecond.png" alt="bg" />
        </div>

    </div>



    <div id="menu2" class="tab-pane fade">
      <h3>Raynor Lower Level</h3>
         <p>PC's available: <?php echo $lowerpcs; ?> Mac's available: <?php echo $lowermacs; ?></p>
         <?php echoLegend() ?>
         <div id="counter">



                        <?php
                                addicons($raynorlower);
                        ?>


                <img src="/ComputerAvailability/Images/RaynorLower.png"  alt="bg" />
        </div>


    </div>




    <div id="menu3" class="tab-pane fade">
      <h3>Memorial</h3>
         <p>PC's available: <?php echo $memorialpcs; ?> Mac's available: <?php echo $memorialmacs; ?></p>
         <?php echoLegend() ?>
         <div id="counter">



                        <?php
                                addicons($raynormemorial);
                        ?>


                <img src="/ComputerAvailability/Images/RaynorMemorial.png"  alt="bg" />
        </div>


    </div>



</div>

Page Refreshes every 30 seconds.
<br>
Last Updated:
<p id="update"></p>


<script>
        var d= new Date();
        document.getElementById("update").innerHTML=d;
</script>



</div>

</body>


</html>

