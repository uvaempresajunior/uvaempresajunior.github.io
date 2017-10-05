<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 21/08/17
 * Time: 18:18
 */

require_once ("assets/PHPMailer_5.2.0/class.phpmailer.php");

$email = $_POST["email"];
$nome = $_POST["name"];
$subject = $_POST["subject"];
$mensagem = $_POST["mensagem"];
$telefone = $_POST["telefone"];
$tipo = $_POST["tipo"];


$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->Host = ""; // email que sera utilizado na saida, nao pode ter autenticacao em duas etapas e tem que liberar o acesso smtp
$mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
$mail->Port       = 587; //  Usar 587 porta SMTP
$mail->Username = ""; // Usuário do servidor SMTP (endereço de email)
$mail->Password = "";




$mail->SetFrom($email, $name); //Seu e-mail
$mail->Subject = $subject;//Assunto do e-mail
$mail->AddAddress("", ""); // config default sendo cliente // e-mail que vai receber

//if($tipo == "voluntario") {
//	$mail->AddAddress("", ""); // e-mail que vai receber
//}

$mail->MsgHTML($mensagem);
if(!$mail->Send()) {
	$fp = fopen("log_erro.txt","w");
	fwrite($fp, $mensagem);
	fclose($fp);
}
header("Location: index.html");
exit;
