<?php 

    include "config.php";

/*
5HOST Version 0.1
Developed by:
 - Liam Newman
 - Ian Murray
 - Felix Angell
*/

if(isset($_GET['id'])) {
    $category = $_GET['id'];
} else {
    die('No ID specified. Cannot continue.');
}

$query = "SELECT * FROM uploads WHERE 'category' = VALUES (?)";
$qdata = array($category);
$stmt = $conn->prepare($query);
$stmt->execute($qdata);

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
    <link rel="stylesheet" href="css/style.css" type="text/css">
  </head>
  
  <body>
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=".">5host</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href=".">Overview</a>
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
        <!-- /.nav-collapse -->
      </div>
      <!-- /.container -->
    </div><!-- /.navbar -->
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button></p>
          <!--/row-->
          <h1 class="page-header">Upload a file to <?php echo getName($conn, $category); ?></h1>
          <!-- not setup right now -->
          <form action="notworkingatm" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>
          <h1 class="page-header">All uploads in <?php echo getName($conn, $category); ?></h1>
          <?php 
            //Table Creation
            echo "<table>";
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { //Getting array of data
                ?>
                <table>
                <tr>
                <td style="padding-left:2em"><a href="uploads/<?php echo $row['filename']?>" class="btn btn-success btn-large">Download</a></td>
                <td style="padding-left:1em"><a href="info.php?id=<?php echo $row['id']?>" class="btn btn-info btn-large">Info</a></td>
                <td><h1 style="padding-left:2em"><?php echo $row['name']; ?></h1></td>
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

