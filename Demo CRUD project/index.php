<!DOCTYPE HTML>  
<html>
	<head>
	</head>
	<body>

    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "user_info_db";

      try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          /*//create table
          $sql = "CREATE TABLE myTableTwo (
          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(30) NOT NULL,
          email VARCHAR(50),
          reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
          )";

          // use exec() because no results are returned
          $conn->exec($sql);
          echo "Table MyGuests created successfully";*/

          /*function insertData($_name, $_email)
          {
              // prepare sql and bind parameters
             $stmt = $conn->prepare("INSERT INTO myTableTwo (name, email)
             VALUES (:name, :email)");
             $stmt->bindParam(':name', $name);
             $stmt->bindParam(':email', $email);

             // insert a row
             $name = $_name;
             $email = $_email;
             $stmt->execute();
           }*/
        }
      catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
      
			// define variables and set to empty values
			$fname = $femail = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
  				$fname = test_input($_POST["name"]);
  				$femail = test_input($_POST["email"]);

          // prepare sql and bind parameters
             $stmt = $conn->prepare("INSERT INTO myTableTwo (name, email)
             VALUES (:name, :email)");
             $stmt->bindParam(':name', $name);
             $stmt->bindParam(':email', $email);

             // insert a row
             $name = $fname;
             $email = $femail;
             $stmt->execute();
			}

			function test_input($data) {
  				$data = trim($data);
  				$data = stripslashes($data);
 				$data = htmlspecialchars($data);
  				return $data;
			}
      $conn = null;
	?>

		<h2>MySQL </h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			Name: <input type="text" name="name"> </br> </br>
			E-mail: <input type="text" name="email"> </br> </br>
			<input type="submit" name="Save Data">
		</form>

		

	</body>
</html>
