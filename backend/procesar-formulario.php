<?php

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');

$nombre = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefono = trim($_POST['phone'] ?? '');
$asunto = trim($_POST['affair'] ?? '');
$mensaje = trim($_POST['message'] ?? '');

// Validación básica del servidor
if (!$nombre || !$email || !$telefono || !$asunto || !$mensaje) {
    echo json_encode(['success' => false, 'message' => 'Campos incompletos']);
    exit;
}

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de Gmail
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'email1234prueba@gmail.com';
    $mail->Password = 'rejt cjgd fris cffi'; // contraseña de aplicación
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // usa TLS para puerto 587
    $mail->Port = 587;

    // Remitente y destinatario
    $mail->setFrom($email, $nombre);
    $mail->addAddress('email1234prueba@gmail.com', "ZimbraTubos");

    // Contenido
    $mail->isHTML(true);
    $mail->Subject = $asunto;
    $mail->Body    = "
        <table style=\"width: 90%; font-family: Arial, sans-serif; border-collapse: collapse;\">
            <tr>
                <td colspan=\"2\" style=\"padding: 10px; background: #1e482a;\">
                    <h2 style=\"margin: 0; text-align: center;\"><a style='color: white; text-decoration: none;' href='https://zimbratubos.com.mx/'>Nuevo mensaje desde el sitio web</a></h2>
                </td>
            </tr>
            <tr><td style=\"padding: 10px;\"><strong style='color: #1e482a;'>Nombre</strong></td><td>$nombre</td></tr>
            <tr><td style=\"padding: 10px;\"><strong style='color: #1e482a;'>Correo electrónico</strong></td><td>$email</td></tr>
            <tr><td style=\"padding: 10px;\"><strong style='color: #1e482a;'>Teléfono</strong></td><td>$telefono</td></tr>
            <tr><td style=\"padding: 10px; vertical-align: top;\"><strong style='color: #1e482a;'>Mensaje</strong></td><td>$mensaje</td></tr>
        </table>
    ";
    $mail->AltBody = $mensaje;

    $mail->send();

    echo json_encode([
        'success' => true,
        'message' => "¡Gracias $nombre por confiar en nosotros! En breve nos pondremos en contacto contigo."
    ]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'No se pudo enviar el correo.', 'error' => $mail->ErrorInfo]);
}