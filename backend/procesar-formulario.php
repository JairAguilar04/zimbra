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

// ENVIAR CORREO
$to = "email1234prueba@gmail.com"; // <-- reemplaza con tu correo
$subject = $asunto;
$body = "Nombre: $nombre\nCorreo: $email\nTeléfono: $telefono\nAsunto: $asunto\nMensaje:\n$mensaje";
$headers = "From: $email\r\nReply-To: $email";

$correoEnviado = mail($to, $subject, $body, $headers);

// ENVIAR WHATSAPP (simulado: abre WhatsApp Web con mensaje)
$mensajeWhatsApp = rawurlencode("Nuevo mensaje:\nNombre: $nombre\nTeléfono: $telefono\nEmail: $email\nAsunto: $asunto\nMensaje:\n$mensaje");
// Si tienes una API real de WhatsApp Business, aquí haces la llamada POST

if ($correoEnviado) {
    echo json_encode(['success' => true, 'whatsapp_link' => "https://wa.me/5217228014814?text=$mensajeWhatsApp"]);
} else {
    echo json_encode(['success' => false, 'message' => 'No se pudo enviar el correo.']);
}
?>