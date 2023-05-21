<!-- ARWEN EVE MARAON VERALIO BSCS 1 2022-01820 || CS 126 MYSQL ASSESMENT

PHP for updating preexisting MySQL table values according to its countryname

SQL query used: 
-SELECT * FROM world2a WHERE amvcountryname = '{$_POST['amvcountryname']}', used to find row associated with inputted countryname

-UPDATE world2a SET $updateQuery WHERE amvcountryname = '{$_POST['amvcountryname']}', used to update cells that have new values

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

      <form action="upd_rec.php" method="POST" style="padding: 10% 0 0 25%">

        <h3>Update Data</h3>
        
       Country Name to Update: <input type="text" name="amvcountryname" id="amvcountryname" required><br>

        <input type="submit" name="submit" id="submit" value="search">

        <br><br>


      <?php

        $conn = mysqli_connect('localhost', 'root', '','amvworld') or die("Connection Failed:".mysqli_connect_error());

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

              $check = $conn->query("SELECT * FROM world2a WHERE amvcountryname = '{$_POST['amvcountryname']}'");
              if($check->num_rows == 0){
                echo "Country not found." ;
                exit(1);
              }
              else echo "{$_POST['amvcountryname']} Found";

              $columns = ['amvregion', 'amvpopulation', 'amvareasqmiles',
                        'amvdensitypersqkm', 'amvnetmigration', 'amvmortalityper1000', 'amvgdp',
                        'amvliteracy', 'amvphonesper1000','amvarable', 'amvcrops', 'amvothers',
                        'amvbirthrate', 'amvdeathrate'];

              $result = $conn -> query("SELECT * FROM world2a WHERE amvcountryname = '{$_POST['amvcountryname']}'");
              $row = $result -> fetch_assoc();

              foreach ($columns as $label){
                            echo "<div>"; 
                            echo "{$label} ";
                            echo "<input type=\"text\" name=\"{$label}\"";
                            echo "value=\"{$row[$label]}\"";
                            echo "required></div>";
                            echo "</div>";
                        }
                    }

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

              $newvalues = array(
                  "amvregion" => $_POST['amvregion'], 
                  "amvpopulation" => $_POST['amvpopulation'], 
                  "amvareasqmiles" => $_POST['amvareasqmiles'], 
                  "amvdensitypersqkm" => $_POST['amvdensitypersqkm'], 
                  "amvnetmigration" => $_POST['amvnetmigration'], 
                  "amvmortalityper1000" => $_POST['amvmortalityper1000'], 
                  "amvgdp" => $_POST['amvgdp'], 
                  "amvliteracy" => $_POST['amvliteracy'], 
                  "amvphonesper1000" => $_POST['amvphonesper1000'], 
                  "amvarable" => $_POST['amvarable'], 
                  "amvcrops" => $_POST['amvcrops'], 
                  "amvothers" => $_POST['amvothers'], 
                  "amvbirthrate" => $_POST['amvbirthrate'], 
                  "amvdeathrate" => $_POST['amvdeathrate'] 
              );

              $updates = array();
              foreach ($newvalues as $column => $value) {
                  if (!empty($value)) {
                      $updates[] = "$column = '$value'";
                  }
              }

              if (!empty($updates)) {
                  $updateQuery = implode(", ", $updates);

                  $sql = "UPDATE world2a SET $updateQuery WHERE amvcountryname = '{$_POST['amvcountryname']}'";

                  if ($conn->query($sql)) echo "Row updated successfully";
                  else echo "Error updating row: " . $conn->error;
              } 
            
              $conn->close();

          }
      ?>




        <input type="submit" name="update" id="update" value="update">


      </form>

      
      
       

    </body>
</html>

