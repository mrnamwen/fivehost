<?php 
/*
  -------------------------------------------
  5HOST Version 1.00
  Developed by:
  Liam Newman
  Ian Murray
  Github Link Planned
  -------------------------------------------
*/

//Get our ID

  if(isset($_GET['id'])) {
$category = $_GET['id'];
} else {
    die('No ID specified. Cannot continue.');
}

//Connection to SQL Database, Script terminated if unable to connect
  mysql_connect("localhost","root","","5host") or die(mysql_error());

  //Select Database (Because for some reason selecting the database via mysql_connect doesn't work ): )
  mysql_select_db("5host");

//Retrieving all files 
  $result = mysql_query('SELECT * FROM uploads WHERE `category` = ' . $category) or die(mysql_error());

  //Get category name
  function getName($catid) {
    $nresult = mysql_query('SELECT `name` FROM categories WHERE `id` = ' . $catid) or die(mysql_error());
    $final = mysql_fetch_row($nresult);
    $final = $final[0];
    return $final;
  }

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
    <style type="text/css">
      /*       * Style tweaks       * --------------------------------------------------       */
      body {
        padding-top: 70px;
      }
      footer {
        padding-left: 15px;
        padding-right: 15px;
      }
      /*       * Off Canvas       * --------------------------------------------------       */
      @media screen and(max-width: 768px) {
        .row-offcanvas {
          position: relative;
          -webkit-transition: all 0.25s ease-out;
          -moz-transition: all 0.25s ease-out;
          transition: all 0.25s ease-out;
        }
        .row-offcanvas-right .sidebar-offcanvas {
          right: -50%;
          /* 6 columns */
        }
        .row-offcanvas-left .sidebar-offcanvas {
          left: -50%;
          /* 6 columns */
        }
        .row-offcanvas-right.active {
          right: 50%;
          /* 6 columns */
        }
        .row-offcanvas-left.active {
          left: 50%;
          /* 6 columns */
        }
        .sidebar-offcanvas {
          position: absolute;
          top: 0;
          width: 50%;
          /* 6 columns */
        }
      }
    </style>
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
          <h1 class="page-header">Upload a file to <?php echo getName($category); ?></h1>
          <!-- not setup right now -->
          <form action="notworkingatm" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>
          <h1 class="page-header">All uploads in <?php echo getName($category); ?></h1>
          <?php 
            //Table Creation
            echo "<table>";
              while($row = mysql_fetch_array($result)){ //Getting array of data
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

