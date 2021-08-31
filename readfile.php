<?php
include("connection.php");
?>
<!doctype html>
<html>
  <head>
    <title></title>
  </head>
  <body>
    <div>
 
     <?php
     $query = "SELECT * FROM videos ORDER BY id DESC";
     $fetchVideos = mysqli_query($con, $query);
     if ($fetchVideos) {
      while($row = mysqli_fetch_assoc($fetchVideos)){
       $vdo_address = $row['vdo_address'];
       $name = $row['name'];
       echo "<div style='float: left; margin-right: 5px;'>
          <video src='".$vdo_address."' controls width='320px' height='320px' ></video>     
          <br>
          <span>".$name."</span>
       </div>";
     }
     }
     
     
     ?>
 
    </div>

  </body>
</html>