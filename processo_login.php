<?php
// if (empty($_POST['email'])) {
//        echo "<script>alert('Preencha o campo E-mail!');history.go(-1);</script>";
//     }
//     elseif (empty($_POST['senha'])) {
//        echo "<script>alert('Preencha o campo Senha!');history.go(-1);</script>";
//     }

//     else{

$server = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "ONG";

	$conn = new mysqli($server, $usuario, $senha, $banco);

	if ($conn->connect_error) {

		die("Falha ao conectar:" . $conn->connect_error);
	}
    ?>

 
<html>
<head>
<script type="text/javascript">
function loginsucess() {
  setTimeout("window.location='inicio.php'",0);
}
function loginfailed() {
  setTimeout("window.location='index.php'",0);
}
</script>
</head>
</html>
<body>

<?php
 
	include_once("loginus.php");
	$email = $_POST["email"];	
    $senha = $_POST["senha"];
   

    $sql = "SELECT * FROM cliente WHERE  email = '$email' and senha = '$senha' ";

    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc())  {
        

    	session_start();
        
    	$_SESSION["email"] = $_POST["email"];
    	$_SESSION["senha"] = $_POST["senha"];
        $_SESSION["idcliente"] = $row["idcliente"];
        $_SESSION["nome"] = $row["nome"];
         $_SESSION["sobrenome"] = $row["sobrenome"];
        $_SESSION["cpf"] = $row["cpf"];
        $_SESSION["n"] = $row["n"];
        $_SESSION["endereco"] = $row["endereco"];
        $_SESSION["estado"] = $row["estado"];
        $_SESSION["cidade"] = $row["cidade"];
        $_SESSION["cep"] = $row["cep"];
        $_SESSION["bairro"] = $row["bairro"];
        $_SESSION["telefone"] = $row["telefone"];
        $_SESSION["celular"] = $row["celular"];


    	echo "<script>loginsucess()</script>";
    }
    else{
    	echo "<script>alert('E-mail ou Senha inválidos!');history.go(-1);</script>";
    	echo "<script>loginfailed()</script>";
    }
    $conn->close();

?>