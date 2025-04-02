<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){

    if(strlen($_POST['email']) == 0){
        alert("Preencha seu Email");
    } else if(strlen($_POST['senha']) == 0){
        alert("Preencha sua Senha");
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuários WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha ao pegar os dados: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: admin.php");

        } else {
            echo "Falha ao logar, Email ou Senha incorretos";
        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/login.css" />
    <title>Login</title>
  </head>
  <body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" class="sign-in-form" method="POST">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="email" placeholder="Email" />
                    </div>
                    <div class="input-field password-container">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="senha" id="password" placeholder="Senha" />
                        <span class="toggle-password" onclick="togglePassword('password')"><i class="bi bi-eye"></i></span>
                    </div>
                    <input type="submit" value="Login" class="btn solid" />
                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon"><i class='bi bi-twitter' ></i></a>
                        <a href="#" class="social-icon"><i class='bi bi-google' ></i></a>
                        <a href="#" class="social-icon"><i class='bi bi-linkedin' ></i></a>
                    </div>
                </form>
                <form action="" class="sign-up-form" method="POST">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username_signup" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email_signup" placeholder="Email" />
                    </div>
                    <div class="input-field password-container">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password_signup" id="password-signup" placeholder="Password" />
                        <span class="toggle-password" onclick="togglePassword('password-signup')"><i class="bi bi-eye"></i></span>
                    </div>
                    <input type="submit" class="btn" value="Sign up" />
                    <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-google"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, ex ratione. Aliquid!</p>
                    <button class="btn transparent" id="sign-up-btn">Sign up</button>
                </div>
                <img src="./assets/CPS.png" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum laboriosam ad deleniti.</p>
                    <button class="btn transparent" id="sign-in-btn">Sign in</button>
                </div>
                <img src="./assets/gremio.png" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="./js/login_senha.js"></script>
    <script src="./js/login_responsivo.js"></script>
  </body>
</html>
