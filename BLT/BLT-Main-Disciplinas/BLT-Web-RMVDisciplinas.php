<!DOCTYPE html>
<html>
<head>
  <title>Educatio - CEFET-MG </title>
  <meta charset="utf-8">

  <!-- CSS do Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet"/>

  <!-- CSS do grupo-->
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

<body>
<div class="corpo">
  <div class="titulo">
  <h1><b>Gerenciamento de Disciplinas</b></h1>
  </div>
</div>
</body>
</html>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$bdNome = "educatio";

header ('Content-type: text/html; charset=ISO-8859-1');

// Create connection
$conn = new mysqli($servername, $username, $password, $bdNome);

// Check connection
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT idTurma, nome, cargaHorariaMin FROM disciplinas WHERE ativo = 'S'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<div class=\"row\">";
    echo "<div class=\"container-fluid\">";
      echo "<div class=\"TabelaExclusao\">";
        echo "<ul class=\"list-group\">";
          while($row = $result->fetch_assoc()) {
            echo "<li class=\"list-group-item align-items-center\">ID Turma: ".$row["idTurma"]." | Nome da disciplina: ".$row["nome"]." | Carga horaria minima: ".$row["cargaHorariaMin"]."</li>
        </ul>
      </div>
    </div>
  </div>";
}
  echo "<body>
        <div class=\"section landing-section\">
          <div class=\"container\">
            <div class=\"row\">
              <div class=\"col-md-8 ml-auto mr-auto\">
  
              <form action=\"BLT-Web-RMVDisciplinas2.php\" method=\"post\">

                <div class=\"row\">
                  <label class=\"fonteTexto\">Nome da disciplina que deseja excluir</label>
                    <div class=\"input-group\">
                      <span class=\"input-group-addon\">
                        <i class=\"nc-icon nc-ruler-pencil\"></i>
                      </span>
                      <input type=\"text\" name=\"nome\" class=\"form-control\" placeholder=\"Nome\" required=\"required\">
                    </div>
                </div>
                <br>

                <div class=\"row\">
                  <label class=\"fonteTexto\">ID da turma que vai excluir a disciplina</label>
                    <div class=\"input-group\">
                      <span class=\"input-group-addon\">
                        <i class=\"nc-icon nc-hat-3\"></i>
                      </span>
                      <input type=\"text\" name=\"idTurma\" class=\"form-control\" placeholder=\"ID da turma\" required=\"required\">
                    </div>
                </div>
                <br>

                <div class=\"row\">
                  <div class=\"col-md-4 ml-auto mr-auto\">
                    <button type=\"submit\" class=\"btn btn-info\">Remover</button>
                  </div>
                </div>
                        
               </form>  
            
              </div>
            </div>
          </div>
        </div> 
        </body>";
} else {
    echo "<div class=\"corpo\">";
    echo "<div class=\"titulo\">";
    echo "<h1><h3><b>Sem valores no banco de dados</b></h3></h1>";
    echo "</div>";
    echo "</div>
    <div class=\"row\">
      <div class=\"col-md-4 ml-auto mr-auto\">
        <button type=\"button\" class=\"btn btn-info\" onclick=\"window.location.href='BLT-Web-Disciplinas.html'\">Pronto</button>
      </div>
    </div>";
}

$conn->close();
?>

