<!DOCTYPE html>
<html>
<head>
  <title>Educatio - CEFET-MG </title>
  <meta charset="utf-8">
  <!-- CSS do Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/bootstrap.css" rel="stylesheet"/>

    <!-- CSS do grupo -->
  <link href="" rel="stylesheet" />

    <!-- Arquivos js -->
  <script src="js/popper.js"></script>
  <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Fontes e icones -->
  <link href="css/nucleo-icons.css" rel="stylesheet">

  <style type="text/css">
    .text-center{
      font-family: 'Abel', sans-serif;
      color: #d8ac29;
    }
    
    .fonteTexto{
      font-family: 'Inconsolata', monospace;
      font-size: 16px;
    }

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
  </style> 

 </head>

<body>

<!--
   Grupo: BLT
   Data de modificação: 30/10/2017
   Autor: Letícia Hubner 
      Objetivo da motificação: Padronizar o código de web
--> 

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

// Create connection
$conn = new mysqli($servername, $username, $password, $bdNome);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT idTurma, nome, cargaHorariaMin FROM disciplinas WHERE ativo = 'S'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<div class=\"container-fluid\">";
    echo "<div class=\"TabelaExclusao\">";
    echo "<ul class=\"list-group\">";
    while($row = $result->fetch_assoc()) {
    	echo "<li class=\"list-group-item align-items-center\">ID Turma: ".$row["idTurma"]." | Nome da disciplina: ".$row["nome"]." | Carga horária mínima: ".$row["cargaHorariaMin"]."</li>
        </ul>
        </div>
        </div>";
  }
  echo "<body>
          <div class=\"margem-DLTEmp\">
          <div class=\"container-fluid\">
          <form action=\"BLT-Web-EDTDisciplinas2.php\" method=\"post\">
              <div class=\"row\" style=\"margin: 70px;\">
                <div class=\"col-md-6 mb-3\">
                    <label for=\"validationServer02\">Nome da disciplina que deseja editar</label>
                    <input type=\"text\" class=\"form-control is-valid\" id=\"validationServer02\" name=\"nome\" placeholder=\"Nome da disciplina\" value=\"\" required>

                  </div>

                  <div class=\"col-md-6 mb-3\">
                  <label for=\"validationServer02\">ID da turma que vai editar a disciplina</label>
                    <input type=\"text\" class=\"form-control is-valid\" id=\"validationServer02\" name=\"idTurma\" placeholder=\"ID da turma\" value=\"\" required>
                    </div>
                    <div class=\"col-md-12 mb-3\">
                    <label for=\"validationServer02\"></label>
                    <button type=\"button\" data-toggle=\"modal\" data-target=\"#exampleModal\" class=\"btn btn-outline-info btn-block btn-lg\">Editar</button>

                    <div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                        <div class=\"modal-dialog\" role=\"document\">
                          <div class=\"modal-content\">
                            <div class=\"modal-header\">
                              <h5 class=\"modal-title\" id=\"exampleModalLabel\">Edição de disciplina</h5>
                              <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                              </button>
                            </div>
                            <div class=\"modal-body\">
                                <div class=\"col-md-6 mb-3\">
                                  <label for=\"validationServer02\">Nome da disciplina</label>
                                  <input type=\"text\" name=\"nomeedt\" class=\"form-control is-valid\" id=\"validationServer02\" placeholder=\"Nome\" value=\"\" required>
                                  <label for=\"validationServer02\">Id da turma</label>
                                  <input type=\"number\" name=\"idTurmaedt\" class=\"form-control is-valid\" id=\"validationServer02\" placeholder=\"ID\" value=\"\" required>
                                  <label for=\"validationServer02\">Carga horária mínima</label>
                                  <input type=\"number\" name=\"carga\" class=\"form-control is-valid\" id=\"validationServer02\" placeholder=\"Horas\" value=\"\" required>
                                </div>
                            </div>
                            <div class=\"modal-footer\">
                              <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Fechar</button>
                              <button type=\"submit\" class=\"btn btn-primary\">Pronto</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                     </div>
                    </div>
                   </div>
                  </div>
           </form>  
          </div>
          </div>
          </body>";
} else {
    echo "<div class=\"corpo\">";
    echo "<div class=\"titulo\">";
    echo "<h1><h3><b>Sem valores no banco de dados</b></h3></h1>";
    echo "</div>";
    echo "</div>
    <div class=\"container-fluid\">
      <div class=\"row\">
        <div class=\"col-md-12 mb-3\">
          <button type=\"button\" class=\"btn btn-outline-info btn-block \" onclick=\"window.location.href='BLT-Web-Disciplinas.html'\">Pronto</button>
        </div>
      </div>
      </div>";
}

$conn->close();
?>

