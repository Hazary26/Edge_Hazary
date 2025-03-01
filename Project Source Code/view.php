<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
$sid=$_SESSION['staff_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php $user?> Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/ms.css">
<link rel="stylesheet" href="style/s.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/ta.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<script src="js/function1.js" type="text/javascript"></script>
   <style>#left-column {height: 477px;}
 #main {height: 477px;}
</style>
</head>
<body>
<div id="content">
<div id="header">
<h1>Pharmacy Management System</h1></div>
<div id="left_column">
<div id="button">
		<ul>
        <li><a href="manager.php"><i class="fa fa-home"></i>&nbsp;Dashboard</a></li>
			<li><a href="view.php"><i class="fa fa-users"></i>&nbsp;View Users</a></li>
			<li><a href="view_prescription.php"><i class="fa fa-prescription-bottle-alt"></i>&nbsp; View Prescription</a></li>
			<li><a href="stock.php"><i class="fa fa-pills"></i>&nbsp;Manage Stock</a></li>
			<li><a href="logout.php"><i class="fa fa-power-off"></i>&nbsp;Logout</a></li>
		</ul>	
</div>
</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>View users</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Pharmacist </a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Cashier</a></li>
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">Manager</a></li>
              
        </ul>  
          
        <div id="content_1" class="content">  
<?php echo $message;
			  echo $message1;
		/* 
		View
        Displays all data from 'Pharmacist' table
		*/
        // connect to the database
        include_once('connect_db.php');
       // get results from database
       $result = mysql_query("SELECT * FROM pharmacist")or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Firstname</th> <th>Lastname </th> <th>Staff ID</th><th>Phone</th><th>Email</th><th>Username </th></tr>";
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['staff_id'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
			} 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="content">  
		          <?php echo $message;
			  echo $message1;
			  
		/* 
		View
        Displays all data from 'Cashier' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysql_query("SELECT * FROM cashier") 
                or die(mysql_error());
				
					    
        // display data in table
        
        echo "<table border='1' cellpadding='5' >";
         echo "<tr><th>Firstname</th> <th>Lastname </th> <th>Staff ID</th><th>Phone</th><th>Email</th><th>Username </th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['staff_id'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				
		 } 
        // close table>
        echo "</table>";
?>
        </div>  
		 <div id="content_3" class="content">  
		        <?php echo $message1;
			  
		/* 
		View
        Displays all data from 'Manager' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysql_query("SELECT * FROM manager") 
                or die(mysql_error());
				
					    
        // display data in table
        
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Firstname</th> <th>Lastname </th> <th>Staff ID</th><th>Phone</th><th>Email</th><th>Username </th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['Staff_id'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				
		 } 
        // close table>
        echo "</table>";
?> 
        </div> 
    </div>  
</div>
</div>
<div id="footer" align="Center"> </div>
</div>
</body>
</html>