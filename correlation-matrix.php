<?php include('db.php');
  if(isset($_GET['sub_id']))
  {
    $id = $_GET['sub_id'];
    $q = "SELECT name FROM subject WHERE id='$id'";
    $sub = mysqli_fetch_assoc(mysqli_query($conn,$q));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini Project</title>
    <style media="screen">
      html{
        text-align: center;
      }
    </style>
    <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="corelation.php">Home</a></li>
    </ul>
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">

          <h2>Corelation Matrix - <?php echo $sub['name']; ?></h2>
          <table class="table table-striped" width="100%">
            <tr>
              <th>CO</th>
              <th>CO Desc</th>
              <th>PO</th>
              <th>Session</th>
              <th>Target</th>
            </tr>
            <?php
              $c = "SELECT * FROM corelation WHERE subject_id='$id'";
              $result = mysqli_query($conn,$c);
              while($row = mysqli_fetch_array($result))
              {
            ?>
              <tr>
                <td><?php echo $row['co']; ?></td>
                <td><?php echo $row['descr']; ?></td>
                <td><?php echo $row['po']; ?></td>
                <td><?php echo $row['session']; ?></td>
                <td><?php echo $row['target']; ?></td>
              </tr>
            <?php
              }
            ?>
          </table>
      </div>
      <div class="row">
        <div class="col-md-offset-1 col-md-10">
          <h2>Matrix</h2>
            <?php
              $query = "SELECT * FROM corelation WHERE subject_id='$id'";
              $res  = mysqli_query($conn,$query);
            ?>
            <table class="table table-striped">
              <tr>
                <td>Course Outcome</td>
                <?php
                  for($i=1;$i<13;$i++)
                  {
                    if($i<10)
                      echo "<td>P0".$i."</td>";
                    else
                      echo "<td>P".$i."</td>";
                  }
                ?>
              </tr>
              <?php
                while($row = mysqli_fetch_array($res))
                {
                  echo "<tr>";
                  echo "<td>".$row['co']."</td>";
                  $po = substr($row['po'],2);
                  for($i=1;$i<13;$i++)
                  {
                    if($i==$po)
                      echo "<td>".$row['session']."</td>";
                    else
                      echo "<td></td>";
                  }
                  echo "<tr>";
                }
              ?>
            </table>
        </div>
      </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>
<?php
}
  else{
    echo "<h2 align='center'>Error 404 - Page not found!</h2>";
  }
?>
