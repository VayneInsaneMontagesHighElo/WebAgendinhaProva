<?php

session_start();

require_once 'db_connect.php';

function clear($input) {
	global $connect;

	$var = mysqli_escape_string($connect, $input);

	$var = htmlspecialchars($var);
	return $var;
}

if(isset($_POST['btn-cadastrar'])):
	$nome = clear($_POST['nome']);
	$sobre = clear($_POST['sobre']);
	$celular = clear($_POST['celular']);
	$email = clear($_POST['email']);
	$dataani = clear($_POST['dataani']);

	$sql = "INSERT INTO tbcontato (nome, sobre, celular, email, dataani) VALUES ('$nome', '$sobre', '$celular', '$email', '$dataani')";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../home.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../home.php');
	endif;
endif;