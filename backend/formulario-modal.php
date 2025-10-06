<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');

$nombre = trim($_POST['name'] ?? '');
$nombreEmpresa = trim($_POST['nameEmpresa'] ?? '');
$telefono = trim($_POST['phone'] ?? '');
$estado = trim($_POST['estado'] ?? '');
$municipio = trim($_POST['municipio'] ?? '');
$poblacion = trim($_POST['poblacion'] ?? '');
$pedidosJSON = $_POST['pedidos'];

$pedidos = json_decode($pedidosJSON, true); // true para convertirlo en array asociativo

if (!$nombre || !$nombreEmpresa || !$telefono || !$estado || !$municipio || !$poblacion || count($pedidos) == 0) {
    echo json_encode(['success' => false, 'message' => 'Campos incompletos']);
    exit;
}


$detallePedidos = "";

//convertimos el array a string para el correo
foreach($pedidos as $idProducto => $cantidad){
    $detallePedidos .= "
        <tr style='text-align: center;'>
            <td style='padding: 8px; border: 1px solid #ddd;'>$idProducto cm</td>
            <td style='padding: 8px; border: 1px solid #ddd;'>$cantidad pzs</td>
        </tr>
    ";
}

// armamos el html para que el email tenga mejor estructura
$body = "
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <style>
    table { border-collapse: collapse; width: 70%; }
    th, td { padding: 8px; border: 1px solid #ddd; }
    th { background-color: #f2f2f2; }
     tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>
<body>

  <h2 style='background: #1e482a; padding: 10px; color: white; text-decoration: none; width: 90%; text-align: center;'>Nueva cotización desde el sitio web</h2>

  <h3 style='color: #1e482a;'>Datos del cliente</h3>
  <p>
    <strong>Nombre:</strong> $nombre<br>
    <strong>Empresa:</strong> $nombreEmpresa<br>
    <strong>Teléfono:</strong> $telefono
  </p>

  <h3 style='color: #1e482a;'>Dirección</h3>
  <p>
    <strong>Estado:</strong> $estado<br>
    <strong>Municipio:</strong> $municipio<br>
    <strong>Población:</strong> $poblacion
  </p>

  <h3 style='color: #1e482a;'>Productos solicitados</h3>
  <table>
    <thead>
      <tr>
        <th>Producto</th>
        <th>Cantidad</th>
      </tr>
    </thead>
    <tbody>
      $detallePedidos
    </tbody>
  </table>
</body>
</html>
";

$mail = new PHPMailer(true);

try{
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
    $mail->setFrom('email1234prueba@gmail.com', $nombre);
    $mail->addAddress('email1234prueba@gmail.com', "ZimbraTubos");

    // Contenido
    $mail->isHTML(true);
    $mail->Subject = "Cotización de tubos para: $nombre";
    $mail->Body    = $body;
    $mail->AltBody = "Cotización enviada de $nombre, con número de teléfono $telefono. Contactalo para saber los detalles";

    $mail->send();

  echo json_encode([
      'success' => true,
      'message' => "$nombre tu cotización ha sido recibida.\nEn breve, nuestro equipo se pondrá en contacto contigo para ofrecerte una atención personalizada."
    ]);
}catch(Exception $e){
  echo json_encode(['success' => false, 'message' => 'No se pudo enviar el correo.', 'error' => $mail->ErrorInfo, $e->getMessage()]);
}
