<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "indesignleandro@gmail.com"; // Seu e-mail
    $subject = htmlspecialchars($_POST["subject"]);
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["msg"]);

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Nome: $name\n";
    $body .= "Email: $email\n";
    $body .= "Mensagem:\n$message\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "success"; // Retorno para o AJAX
    } else {
        echo "error"; // Retorno para o AJAX
    }
} else {
    http_response_code(403);
    echo "Acesso negado!";
}
?>
