<!-- ARWEN EVE MARAON VERALIO BSCS 1 2022-01820 || CS 126 MYSQL ASSESMENT

PHP for deleting specified values from the MySQL table

SQL query used: 
-SELECT * FROM world2a WHERE amvcountryname = '{$_POST['amvcountryname']}', used to find row associated with inputted countryname

-DELETE FROM world2a WHERE amvcountryname = '{$_POST['amvcountryname']}, used to delete the row if the countryname is found by MySQL

 -->
<html>
    <head>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    </head>
        
     <body>
            
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand">World Data</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="world.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dis_rec.php">Show Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ins_rec.php">Insert Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="del_rec.php">Delete Record</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="upd_rec.php">Update Record</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <form action="del_rec.php" method="POST" style="padding: 10% 0 0 25%">
        
       Enter Country Name to Delete: <input type="text" name="amvcountryname" id="amvcountryname" required><br><br>


        <input type="submit" name="submit" id="submit">


      </form>

      <?php

          if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $conn = mysqli_connect('localhost', 'root', '','amvworld') or die("Connection Failed:".mysqli_connect_error());

            $result = $conn->query("SELECT * FROM world2a WHERE amvcountryname = '{$_POST['amvcountryname']}'");
            if($result->num_rows == 0) echo "Country not found.";
            else {
               
              $sql = "DELETE FROM world2a WHERE amvcountryname = '{$_POST['amvcountryname']}'";

            }

            $query = mysqli_query($conn,$sql);
            if ($query) echo "Success!";
            else echo "Error Occurred.";
            $conn->close();

          }

      ?>
       
    </body>
</html>

