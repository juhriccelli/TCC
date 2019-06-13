  <?php
  //Conectar o banco de dados
  $servername = "localhost";
  $username = "id9315071_admin";
  $password = "admin";
  $database = "id9315071_tcc";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //Criar a tabela FILIADOS
      $filiados = "CREATE TABLE MyGuests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP)";

        $conn->exec($filiados);

      } catch(PDOException $e) {
      echo $e->getMessage();
      }

  ?>
