
<!-- ARWEN EVE MARAON VERALIO BSCS 1 2022-01820 || CS 126 MYSQL ASSESMENT

PHP for displaying the data inside the world2a table according to the way it is presented. 
SQL query used: SELECT * FROM world2a, used fetch_assoc which gives associated rows for each column, and is done for every row

 -->
<!DOCTYPE html>
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
	
				<div style="margin: 20px 0 0 20px;">

		<?php
                $mysqli = mysqli_connect('localhost', 'root', '','amvworld') or die("Connection Failed:".mysqli_connect_error());

                $query = "SELECT * FROM world2a";
                $labels =   ["countryname", "region", "population" ,"areasqmiles" ,"densitypersqkm",
                            "netmigration", "mortalityper1000", "gdp", "literacy" ,"phonesper1000",
                            "arable", "crops", "others", "birthrate", "deathrate"];

                echo '<table class="table"><tr>';
                for($i = 0; $i < count($labels); $i++) echo '<th>'.$labels[$i].'</th>';
                echo '</tr>';
                
                if ($result = $mysqli->query($query)) {
                    while ($row = $result->fetch_assoc()) {
                        $countryname = $row["amvcountryname"];
                        $region = $row["amvregion"];
                        $population = $row["amvpopulation"];
                        $areasqmiles = $row["amvareasqmiles"];
                        $densitypersqkm = $row["amvdensitypersqkm"];
                        $netmigration = $row["amvnetmigration"];
                        $mortalityper1000 = $row["amvmortalityper1000"];
                        $gdp = $row["amvgdp"];
                        $literacy = $row["amvliteracy"];
                        $phonesper1000 = $row["amvphonesper1000"]; 
                        $arable = $row["amvarable"];
                        $crops = $row["amvcrops"];
                        $others = $row["amvothers"];
                        $birthrate = $row["amvbirthrate"];
                        $deathrate = $row["amvdeathrate"]; 
                
                        echo '<tr> 
                                  <td>'.$countryname.'</td>
                                  <td>'.$region.'</td>
                                  <td>'.$population.'</td>
                                  <td>'.$areasqmiles.'</td>
                                  <td>'.$densitypersqkm.'</td>
                                  <td>'.$netmigration.'</td> 
                                  <td>'.$mortalityper1000.'</td> 
                                  <td>'.$gdp.'</td> 
                                  <td>'.$literacy.'</td> 
                                  <td>'.$phonesper1000.'</td> 
                                  <td>'.$arable.'</td> 
                                  <td>'.$crops.'</td> 
                                  <td>'.$others.'</td> 
                                  <td>'.$birthrate.'</td> 
                                  <td>'.$deathrate.'</td> 
                              </tr>';
                    }
                    $result -> free();
                } 
            ?>
            	</div>
       

    </body>
</html>

