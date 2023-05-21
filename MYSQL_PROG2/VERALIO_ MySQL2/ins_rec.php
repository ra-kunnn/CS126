<!-- ARWEN EVE MARAON VERALIO BSCS 1 2022-01820 || CS 126 MYSQL ASSESMENT

PHP for inserting new table data into the MySQL table
SQL query used: INSERT INTO world2a VALUES ('$amvcountryname', '$amvregion', '$amvpopulation', '$amvareasqmiles', '$amvdensitypersqkm', '$amvnetmigration', '$amvmortalityper1000', '$amvgdp', '$amvliteracy', '$amvphonesper1000', '$amvarable', '$amvcrops', '$amvothers', '$amvbirthrate', '$amvdeathrate'), where each variable is linked to each of the form inputs

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

      <form action="ins_rec.php" method="POST" style="padding: 10% 0 0 25%">

      	<h3>Insert Data</h3>
        
       Country Name: <input type="text" name="amvcountryname" id="amvcountryname" required><br><br>
       Region: <input type="text" name="amvregion" id="amvregion" required><br><br>
       Population: <input type="text" name="amvpopulation" id="amvpopulation" required><br><br>
       Area (miles^2): <input type="text" name="amvareasqmiles" id="amvareasqmiles" required><br><br>
       Density per km^2: <input type="text" name="amvdensitypersqkm" id="amvdensitypersqkm" required><br><br>
       Net Migration: <input type="text" name="amvnetmigration" id="amvnetmigration" required><br><br>
       Mortality per 1000: <input type="text" name="amvmortalityper1000" id="amvmortalityper1000" required><br><br>
       GDP: <input type="text" name="amvgdp" id="amvgdp" required><br><br>
       Literacy: <input type="text" name="amvliteracy" id="amvliteracy" required><br><br>
       Phones per 1000: <input type="text" name="amvphonesper1000" id="amvphonesper1000" required><br><br>
       Arable: <input type="text" name="amvarable" id="amvarable" required><br><br>
       Crops: <input type="text" name="amvcrops" id="amvcrops" required><br><br>
       Others: <input type="text" name="amvothers" id="amvothers" required><br><br>
       Birthrate: <input type="text" name="amvbirthrate" id="amvbirthrate" required><br><br>
       Deathrate: <input type="text" name="amvdeathrate" id="amvdeathrate" required><br><br>


        <input type="submit" name="submit" id="submit">


      </form>



      <?php

          if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $conn = mysqli_connect('localhost', 'root', '','amvworld') or die("Connection Failed:".mysqli_connect_error());

            if (isset($_POST['amvcountryname']) && isset($_POST['amvregion']) && isset($_POST['amvpopulation']) && isset($_POST['amvareasqmiles']) && isset($_POST['amvdensitypersqkm']) && isset($_POST['amvnetmigration']) && isset($_POST['amvmortalityper1000']) && isset($_POST['amvgdp']) && isset($_POST['amvliteracy']) && isset($_POST['amvphonesper1000']) && isset($_POST['amvarable']) && isset($_POST['amvcrops']) && isset($_POST['amvothers']) && isset($_POST['amvbirthrate']) && isset($_POST['amvdeathrate'])){

              $amvcountryname = $_POST['amvcountryname'];
              $amvregion = $_POST['amvregion'];
              $amvpopulation = $_POST['amvpopulation'];
              $amvareasqmiles = $_POST['amvareasqmiles'];
              $amvdensitypersqkm = $_POST['amvdensitypersqkm'];
              $amvnetmigration = $_POST['amvnetmigration'];
              $amvmortalityper1000 = $_POST['amvmortalityper1000'];
              $amvgdp = $_POST['amvgdp'];
              $amvliteracy = $_POST['amvliteracy'];
              $amvphonesper1000 = $_POST['amvphonesper1000'];
              $amvarable = $_POST['amvarable'];
              $amvcrops = $_POST['amvcrops'];
              $amvothers = $_POST['amvothers'];
              $amvbirthrate = $_POST['amvbirthrate'];
              $amvdeathrate = $_POST['amvdeathrate'];
              
            } 

            $sql = "INSERT INTO world2a VALUES ('$amvcountryname', '$amvregion', '$amvpopulation', '$amvareasqmiles', '$amvdensitypersqkm', '$amvnetmigration', '$amvmortalityper1000', '$amvgdp', '$amvliteracy', '$amvphonesper1000', '$amvarable', '$amvcrops', '$amvothers', '$amvbirthrate', '$amvdeathrate')";

            $query = mysqli_query($conn,$sql);
            if ($query) echo "Success!";
            else echo "Error Occurred.";
        }

      ?>
       

    </body>
</html>

