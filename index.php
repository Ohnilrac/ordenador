<?php 
include_once("./config/db.php");


$sql = "SELECT * FROM contas";
$stmt = $pdo->prepare($sql);  
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Ordenador</title>
</head>
<body>
  <div class="container">

    <header>
      <h1>
        User Management
      </h1>
    </header>
    <div>
      <form action="filtrar.php">
        <select name="" id="">
          <option value="selecionar">Selecionar</option>
          <option value="nome">Nome (A - Z)</option>
          <option value="email">Email (A - Z)</option>
          <option value="idade">Por idade</option>
          </select>
      </form>
    </div>
    <main>
      <?php 
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($usuarios as $usuario): // Aqui no final do foreach eu adicionei dois pontos, para que o fluxo não fosse finalizado, caso eu tivesse utilizado o ponto e virgula, coisa que só deverá ser feita, quando o foreach finalizar o que eu quero que ocorra.
      ?>

      <i>User</i>
      <div>
        <h2><?= htmlspecialchars($usuario['titular']) ?></h2> <!-- Comecei a utilizar o htmlspecialchars, para evitar problemas de injeção de html, por mais que tenhamos usado o prepare lá na solicitação dos dados do DB. Chamado de dados XSS, EX: <script>alert('escript de um engraçadinho')</script> -->
        <p><?= htmlspecialchars($usuario['email']) ?></p>
      </div>
      <p>Idade</p>
      <hr><?php endforeach; ?> <!-- Aqui eu estou finalizando o fluxo que eu espero que o foreach faça -->
    </main>
    <footer>
      <i>Cadastrar</i>
    </footer>

  </div>
</body>
</html>