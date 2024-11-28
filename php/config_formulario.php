<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "hotel"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $documento = $_POST['documento'];
  $criancas = $_POST['criancas'];
  $adultos = $_POST['adultos'];
  $info_adicional = $_POST['info-adicional'];
  $numero_cartao = $_POST['cartao'];
  $cvv = $_POST['cvv'];
  $data_validade = $_POST['data-validade'];
  $tipo_quarto = $_POST['tipo-quarto'];
  $info_complementar = $_POST['info-complementar'];
  $data_chegada = $_POST['data-chegada'];
  $data_saida = $_POST['data-saida'];




  $sql = "INSERT INTO reservas (nome, email, telefone, documento, criancas, adultos, info_adicional, numero_cartao, cvv, data_validade, tipo_quarto, info_complementar, data_chegada, data_saida) 
  VALUES ('$nome', '$email', '$telefone', '$documento', '$criancas', '$adultos', '$info_adicional', '$numero_cartao', '$cvv', '$data_validade', '$tipo_quarto', '$info_complementar', '$data_chegada', '$data_saida')";

  if ($conn->query($sql) === TRUE) {
    echo '<style>
        body {
          margin: 0;
          padding: 0;
          background-color: #f5f5f5; 
        }

        .container {
          width: 100%;
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
          font-family: Arial, sans-serif;
          color: #333; 
        }

        .sucesso {
          background-color: #ffffff; 
          padding: 30px;
          border-radius: 10px;
          text-align: center;
          box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1); 
          max-width: 500px;
          border: 2px solid #08a88e; 
        }

        .sucesso h2 {
          font-size: 28px;
          color: #08a88e; 
          margin-bottom: 20px;
        }

        .sucesso p {
          font-size: 18px;
          margin-bottom: 20px;
          color: #555; 
        }

        .voltar-link {
          text-decoration: none;
          color: #fff;
          font-size: 18px;
          display: inline-block;
          margin-top: 20px;
          background-color: #08a88e; 
          padding: 15px 25px;
          border-radius: 50px;
          transition: background-color 0.3s ease;
        }

        .voltar-link:hover {
          background-color: #007f75; 
        }
      </style>';

echo "<div class='container'>
        <div class='sucesso'>
          <h2>Reserva realizada com sucesso!</h2>
          <p>Agora você pode aproveitar sua estadia conosco. Esperamos que tenha uma ótima experiência.</p>
          <a href='http://localhost/hotel/index.html' class='voltar-link'>Voltar para o formulário</a>
        </div>
      </div>";
      
  } else {
    echo "Erro ao cadastrar: " . $conn->error;
  }
}

$conn->close();
?>