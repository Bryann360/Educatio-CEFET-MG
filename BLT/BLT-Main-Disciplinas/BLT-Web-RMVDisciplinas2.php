<!DOCTYPE html>
<html>
<head>
  <title>Educatio - CEFET-MG </title>
  <meta charset="utf-8">

  <!-- CSS do Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet"/>

  <!-- CSS do grupo -->
    <link href="BLT-Web-Disciplinas.css" rel="stylesheet">

  <!-- Arquivos js -->
    <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

  <!-- Fontes e icones -->
    <link href="https://fonts.googleapis.com/css?family=Abel|Inconsolata" rel="stylesheet">
    <link href="css/nucleo-icons.css" rel="stylesheet">

    <style type="text/css">
      .btn-info {
        background-color: #162e87;
        border-color: #162e87;
        color: #FFFFFF;
        opacity: 1;
        filter: alpha(opacity=100);
      }
      .btn-info:hover, .btn-info:focus, .btn-info:active, .btn-info.active, .show > .btn-info.dropdown-toggle {
        background-color: #11277a;
        color: #FFFFFF;
        border-color: #11277a;
      }
      .fonteTexto{
         font-family: 'Inconsolata', monospace;
         font-size: 16px;
      }
    </style> 

</head>

</html>

<body>
</body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$bdNome = "educatio";

// Create connection
$conn = new mysqli($servername, $username, $password, $bdNome);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$IDTurma = $_POST['idTurma'];



        $sql = "UPDATE disciplinas SET ativo='N' WHERE nome='$nome' AND idTurma='$IDTurma'";
        if ($conn->query($sql) === TRUE) {
          echo "<div class=\"corpo\">";
          echo "<div class=\"titulo\">";
          echo "<h1>";
          echo "<b>Disciplina excluida com sucesso!</b>";
          echo "</h1><br>";
          echo "<div class=\"row\">
                <div class=\"col-md-4 ml-auto mr-auto\">
                  <button type=\"button\" class=\"btn btn-info\" onclick=\"window.location.href='BLT-Web-Disciplinas.html'\">Pronto</button>
                </div>
                </div>";
          echo "</div>";
          echo "</div>";
        } else {
          echo "Error updating record: " . $conn->error;
        }

$conn->close();
?>