<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = " ContasCertaVirtual@gmail.com";
    $subject = htmlspecialchars($_POST['sbject']);
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);


    if ($name && $email && $subject && $message) {
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        $body = "Nome: $name\n";
        $body .= "Email: $email\n\n";
        $body .= "Mensagem:\n$message\n";


        if (mail($to, $subject, $body, $headers)) {
            echo "Sua mensagem foi enviada com sucesso.";
        } else {
            echo "Erro ao enviar a mensagem. Tente novamente.";
        }
    } else {
        echo "Preencha todos os campos corretamente.";
    }
} else {
    echo "Método de envio inválido.";
}
?>
