<?php
  include("_includes/config.inc");
  include("_includes/dbconnect.inc");
  include("_includes/functions.inc");

  //check if logged in
  if(isset($_SESSION['id'])){

    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");

    //Build SQL statement that selects students
    $sql = "select * from students";

    $result = mysql_query($conn, $sql);

    //prepare page content
    $sata['content'] .= "<table border='1'>";
    $data['content'] .= "<tr><th colspan='9' align='center'>Students</th></tr>";
    $data['content'] .= "<tr><th>Student ID</th><th>DOB</th><th>First Name</th><th>Last Name</th><th>House</th><th>Town</th><th>County</th><th>Coutnry</th><th>Postcode</th></tr>";

    while($row = mysqli_fetch_array($result)){
      $data['content'] .= "<tr><td>$row[studentid]</td><td>$row[dob]</td><td>$row[firstname]</td><td>$row[lastname]</td><td>$row[house]</td><td>$row[town]</td><td>$row[county]</td><td>$row[country]</td><td>$row[postcode]</td></tr>";
    }
    $data['content'] .= "</table>";

    //render the template
    echo template("templates/default.php", $data);
  }
  else{
    header("Location: index.php");
  }

  echo template("templates/partials/footer.php");
  ?>