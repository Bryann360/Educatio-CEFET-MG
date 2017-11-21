<!DOCTYPE html>
<html>
<head>
  <title>Educatio - CEFET-MG </title>
  <meta charset="utf-8">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="gerencia-web-estilos-rodape.css" rel="stylesheet">
  <link href="BLT-Web-Emprestimos.css" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script> 
  <script src="BLT-Web-Emprestimos.js"></script> 
 </head>
 <body>
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

$IDaluno = $_POST['IDaluno'];
$IDacervo = $_POST['IDacervo'];
$multa = "0";
$ativo = "S";


$sql = "SELECT idAluno, idAcervo, dataEmprestimo, dataPrevisaoDevolucao, dataDevolucao, multa, ativo FROM emprestimos WHERE idAcervo = '$IDacervo' AND ativo='S'";

$datacriacao = date('Y-m-d');
$dataDevv = new DateTime($datacriacao);
$dataDevv->add(new DateInterval('P7D'));
$dataDevv = $dataDevv->format('Y-m-d');


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	if($IDacervo == $row["idAcervo"]){





    			$sqlio = "SELECT idAluno, idAcervo, dataReserva, tempoEspera, emprestou, ativo FROM reservas WHERE idAcervo = '$IDacervo' AND ativo='S' ORDER BY id ASC";

				$resulta = $conn->query($sqlio);


				if ($resulta->num_rows > 0) {
				    while($rows = $resulta->fetch_assoc()) {
			    		if($IDacervo == $rows["idAcervo"]){




			    			$dataUltimaRes = $rows["dataReserva"];

			    			


				      	
			    		}
			    		
			    	}

		    		
			    	$dataCria = new DateTime($dataUltimaRes);
					$dataCria->add(new DateInterval('P8D'));
					$dataCria = $dataCria->format('Y-m-d');

		    		


		    		$sqlii = "INSERT INTO reservas (idAluno, idAcervo, dataReserva, tempoEspera, emprestou, ativo) VALUES ('$IDaluno', '$IDacervo', '$dataCria', '7', 'N', 'S')";


				if ($conn->query($sqlii) === TRUE) {
				echo "<div class=\"container-fluid\">";
				echo "<div class=\"corpo\">";
	            echo "<div class=\"titulo\">";
	            echo "<h1>";
	            echo "<b>Reserva efetuada!</b>";
	            echo "</h1>";
	             echo "<h1><h5>Acervo já está emprestado... Reserva efetuada para o dia: ".$dataCria."</h5></h1>" ;
	            echo "<div class=\"row\">
	                  <div class=\"col-md-12 mb-3\">
	                  <div class=\"container-fluid\">
	                  <button type=\"button\" style=\"margin-top: 70px;\"class=\"btn btn-outline-info btn-block \" onclick=\"window.location.href='BLT-Web-Emprestimos.html'\">Pronto</button>
	                  </div>
	                  </div>
	                  </div>";
	            echo "</div>";
	            echo "</div>";
	            echo "</div>";
	            $conn->close();

			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}


		}else{


			$dataMaior= date_create($row["dataPrevisaoDevolucao"]);
      		$dataMenor= date_create($row["dataEmprestimo"]);
			$datarres=date_diff($dataMenor,$dataMaior);
			$datarrres = $datarres->format("%a");
			//$daysDif = 'P'.$datarrres.'D';
			$dataMaiorParaDataRes = new DateTime($row["dataPrevisaoDevolucao"]);
			//$dataMaiorParaDataRes->add(new DateInterval($daysDif));
			$dataMaiorParaDataRes->add(new DateInterval('P1D'));

    		$dataReserva = $dataMaiorParaDataRes->format('Y-m-d');



















			
      		

			$sqlii = "INSERT INTO reservas (idAluno, idAcervo, dataReserva, tempoEspera, emprestou, ativo) VALUES ('$IDaluno', '$IDacervo', '$dataReserva', '7', 'N', 'S')";

			if ($conn->query($sqlii) === TRUE) {
				echo "<div class=\"container-fluid\">";
				echo "<div class=\"corpo\">";
	            echo "<div class=\"titulo\">";
	            echo "<h1><h5>Acervo já está emprestado... Reserva efetuada para o dia: ".$dataReserva."</h5></h1>" ;
	            echo "<h1>";
	            echo "<b>Reserva efetuada!</b>";
	            echo "</h1>";
	            echo "<div class=\"row\">
	                  <div class=\"col-md-12 mb-3\">
	                  <div class=\"container-fluid\">
	                  <button type=\"button\" style=\"margin-top: 70px;\"class=\"btn btn-outline-info btn-block \" onclick=\"window.location.href='BLT-Web-Emprestimos.html'\">Pronto</button>
	                  </div>
	                  </div>
	                  </div>";
	            echo "</div>";
	            echo "</div>";
	            echo "</div>";
	            $conn->close();

			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

		}


    		$sql = "SELECT idAluno, idAcervo, datacriacao, dataPrevisaoDevolucao, dataDevolucao, multa, ativo FROM emprestimos WHERE idAcervo = '$IDacervo' AND ativo='S'";







    		$dataprev = new DateTime($row["dataPrevisaoDevolucao"]);
    		$dataprev->add(new DateInterval('P1D'));
    		$datanova = $dataprev->format('Y-m-d');


    		
				


		}
	}

}else{

	$sql = "INSERT INTO emprestimos (idAluno, idAcervo, dataEmprestimo, dataPrevisaoDevolucao, dataDevolucao, multa, ativo) VALUES ('$IDaluno', '$IDacervo', '$datacriacao', '$dataDevv', '$dataDevv', '$multa', '$ativo')";


	if ($conn->query($sql) === TRUE) {
		echo "<div class=\"container-fluid\">";
		echo "<div class=\"corpo\">";
        echo "<div class=\"titulo\">";
        echo "<h1 style=\"margin-top: 40px\">";
        echo "Reserva efetuada com sucesso!";
        echo "</h1>";
        echo "<div class=\"row\">
              <div class=\"col-md-12 mb-3\">
              <div class=\"container-fluid\">
              <button type=\"button\" style=\"margin-top: 70px;\"class=\"btn btn-outline-info btn-block \" onclick=\"window.location.href='BLT-Web-Emprestimos.html'\">Pronto</button>
              </div>
              </div>
              </div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        $conn->close();

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

}




?>