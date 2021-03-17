<?php
require "Server.php";
require "headers.php";
require "footers.php";
?>

<div class="main-heading">
<h1>DETAILS OF THE DOG OWNER</h1>
</div>
<?php
global $conn ;



$query = "SELECT name , address , email , phone " ;
$query .= " FROM OWNERS ";
$query .= "WHERE ID =" ;
$query  .= "\"" . $_GET['id'] . "\"" ;

$details = $conn ->query($query) ->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="profile" >
<?php
$images = array();
$images = ["images/10.png","images/9.png","images/3.png","images/4.png","images/5.png","images/6.png","images/7.png","images/8.png","images/9.png","images/10.png","images/11.png","images/12.png","images/1.png","images/12.png","images/3.png","images/4.png","images/5.png","images/6.png","images/7.png","images/8.png","images/9.png","images/10.png","images/11.png","images/12.png","images/12.png","images/7.png","images/7.png","images/12.png","images/3.png","images/4.png","images/5.png","images/6.png","images/7.png","images/8.png","images/5.png","images/8.png","images/10.png","images/11.png","images/6.png","images/9.png","images/3.png","images/3.png","images/4.png","images/5.png","images/6.png","images/7.png","images/8.png","images/9.png","images/10.png"];
$i = $_GET['id'];


echo "<img src=\"{$images[$i]}\" width=\"100px\" height=\"100px\">";
?>
</div>




<div class="profile-details" >
 <?php
if(count($details ) > 0 ) {
    foreach ($details as $d) {

        echo "<p>Name: " . $d ['name'] . "</p>";
        echo "<p>Address: " . $d['address'] . "</p>" ;
        echo "<p>Email: ".$d['email']."</p>";
        echo "<p>Phone: ".$d['phone']."</p>";
    }
}
else {
    echo "<p>Branch not found</p>" ;
}
 ?>
</div>





