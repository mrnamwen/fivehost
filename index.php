<?php

    include "config.php";

/*
5HOST Version 0.1
Developed by:
 - Liam Newman
 - Ian Murray
 - Felix Angell
*/

$query = "SELECT * FROM uploads ORDER BY id DESC LIMIT 10";
$stmt = $conn->prepare($query);
$stmt->execute();


?>

<!doctype html>

<html>
  
  <head>
    <title>5host</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootswatch/3.0.0/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
  </head>
  
  <body>
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">5host</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="#">Overview</a>
            </li>
            <li>
              <a href="cat.php?id=1">Movies</a>
            </li>
            <li>
              <a href="cat.php?id=2">Music</a>
            </li>
            <li>
              <a href="cat.php?id=3">TV Shows</a>
            </li>
            <li>
              <a href="cat.php?id=4">Software</a>
            </li>
            <li>
              <a href="cat.php?id=5">NSFW</a>
            </li>
            <li>
              <a href="cat.php?id=6">Pirates (Not Monitored!)</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button></p>
          <div class="jumbotron">
            <h1>Welcome to 5Host.</h1>
            <p>5Host is an anonymous file sharing site that allows people to view any file uploaded by users. There is <b>little to no moderation</b>, so make sure that you know what you're going in for.</p>
          </div>
          <h1 class="page-header">Recent Uploads</h1>
                <?php
                echo "<table>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <table>
                <tr>
                <td style="padding-left:2em"><a href="uploads/<?php
    echo $row['filename'];
?>" class="btn btn-success btn-large">Download</a></td>
                <td style="padding-left:1em"><a href="info.php?id=<?php
    echo $row['id'];
?>" class="btn btn-info btn-large">Info</a></td>
                <td><h1 style="padding-left:2em"><?php
    echo $row['name'];
?></h1><p>File in category: <?php
    echo getName($conn, $row['category']);
?></p></td>
                </tr>
                </table>
                <?php
}
echo "</table>";
?>
        </div>
        <!--/span-->
        <!--/span--> 
      </div>
      <!--/row-->
      <hr>
      <footer>
        <p>&copy; 2014, Voxelvein Studios. All rights reserved. <a href="doge.html">Donate Doge?</a></p>
      </footer>
    </div>
    <!--/.container-->
    <script>
      $(document).ready(function() {
        $('[data-toggle=offcanvas]').click(function() {
          $('.row-offcanvas').toggleClass('active');
        });
      });
    </script>
  </body>
