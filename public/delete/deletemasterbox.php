<html>

<body>
    <?php

$dbname = 'sunkrisps';
$dbuser = 'root';  
$dbpass = 'ssdautomation'; 
$dbhost = '192.168.100.248'; 
$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$connect){
	echo "Error: " . mysqli_connect_error();
	exit();
}
// sql to delete a record
$c = 0;
if ($c==0) {
    //echo "Delete!<br><br>";
    // $No = $_GET[`No`]; 
    // sql to delete a record
    $sql = "DELETE FROM master_box WHERE `mb_id` ='$_GET[mb_id]'";
    $result = mysqli_query($connect,$sql);
    echo "Delete Success!";
    $b = 0;
}
    // sql to refresh auto increment
if ($b == 0) {
   // echo "Drop!<br><br>";
    $query = "ALTER TABLE master_box DROP `mb_id`;";  
    $result = mysqli_query($connect,$query);    
    //echo "Drop Success!<br>";
    $a = 1;
}
if ($a == 1) {
   // echo "Auto!<br><br>";
    $query2 = "ALTER TABLE master_box ADD `mb_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";  
    $result2 = mysqli_query($connect,$query2); 
   // echo "Auto Success!<br>";
   header("Location: http://ssd-wmsunkrisps.com:8080/masterdatabox#");
}

?>
</body>

</html>