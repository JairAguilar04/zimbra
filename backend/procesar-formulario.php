<?php
header('Content-Type: application/json');

// Validación básica del servidor
$nombre = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefono = trim($_POST['phone'] ?? '');
$asunto = trim($_POST['affair'] ?? '');
$mensaje = trim($_POST['message'] ?? '');

if (!$nombre || !$email || !$telefono || !$asunto || !$mensaje) {
    echo json_encode(['success' => false, 'message' => 'Campos incompletos']);
    exit;
}

$to = "email1234prueba@gmail.com";
$subject = $asunto;
$body = "Nombre: $nombre\n\nMensaje:\n$mensaje\n\nDatos de contacto\nCorreo: $email\nTeléfono: $telefono";
$headers = "From: $email\r\nReply-To: $email";

// ENVIAR CORREO
$correoEnviado = mail($to, $subject, $body, $headers);

// ENVIAR WHATSAPP (simulado: abre WhatsApp Web con mensaje)
$mensajeWhatsApp = rawurlencode("Nuevo mensaje:\nNombre: $nombre\nTeléfono: $telefono\nEmail: $email\nAsunto: $asunto\nMensaje:\n$mensaje");

if ($correoEnviado) {
    echo json_encode([
        'success' => true,
        'whatsapp_link' => "https://wa.me/5217228014814?text=$mensajeWhatsApp",
        'message' => '¡Gracias por confiar en nosotros! En breve nos pondremos en contacto contigo.'
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'No se pudo enviar el correo.']);
}
?>