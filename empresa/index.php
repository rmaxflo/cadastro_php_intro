<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="restrito/css/bootstrap.min.css">
    <title>Empresa</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
          <div class="jumbotron">
            <h1 class="display-4">Login</h1>
            <form action="index.php" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail1">Login</label>
                  <input type="text" class="form-control" name="login">
                  <small  class="form-text text-muted">Entre com seus dados de acesso</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Senha</label>
                  <input type="password" class="form-control" name="senha">
                </div>
                <button type="submit" class="btn btn-primary">Acessar</button>
              </form>
              <?php   
                  if (isset($_POST['login'])) {
                    $login = $_POST['login'];                  
                    $senha = md5($_POST['senha']) ;

                    include "restrito/conexao.php";
                    $sql = "SELECT * from `usuarios` WHERE login = '$login' AND senha = '$senha'";
                    echo "<h6>$sql</h6>";

                    if ($result = mysqli_query($conn, $sql)) {
                      $num_registros = mysqli_num_rows($result);
                      if ($num_registros == 1) {
                        $linha = mysqli_fetch_assoc($result);


                        if (($login == $linha['login']) and ($senha == $linha['senha'])) {
                        session_start();
                        $_SESSION['login'] = "Robson";
                        header("location: restrito");
                      } else {
                        echo "Login inválido!";
                      }
                      } else {
                        echo "Login ou senha não encontrados ou inválido.";
                      }
                    } else { echo "Nenhum resultado do Banco de Dados"; }
                  }
               ?>
          </div>
      </div>
      <div class="col-3"></div>
    </div>
    

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>