<?php
header('Content-Type: application/json');

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
$datallePedidosWhatsapp = "";

//convertimos el array a string para el correo y whatsapp
foreach($pedidos as $idProducto => $cantidad){
    $detallePedidos .= "
        <tr style='text-align: center;'>
            <td style='padding: 8px; border: 1px solid #ddd;'>$idProducto cm</td>
            <td style='padding: 8px; border: 1px solid #ddd;'>$cantidad pzs</td>
        </tr>
    ";

    $datallePedidosWhatsapp .= "
      Tubo de $idProducto cm ==> $cantidad pzs\n
    ";
}

// armamos el html para que el email tenga mejor estructura
$body = "
<html>
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
  <h2>Cotización de tubos para: $nombre</h2>

  <h3>Datos del cliente</h3>
  <p><strong>Nombre:</strong> $nombre<br>
     <strong>Empresa:</strong> $nombreEmpresa<br>
     <strong>Teléfono:</strong> $telefono</p>

  <h3>Dirección</h3>
  <p><strong>Estado:</strong> $estado<br>
     <strong>Municipio:</strong> $municipio<br>
     <strong>Población:</strong> $poblacion</p>

  <h3>Productos solicitados</h3>
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

$to = "email1234prueba@gmail.com";
$subject = "Cotización de tubos para: $nombre";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: email1234prueba@gmail.com\r\n";
$headers .= "Reply-To: email1234prueba@gmail.com\r\n";

// ENVIAR CORREO
$correoEnviado = mail($to, $subject, $body, $headers);

// ENVIAR WHATSAPP (abre WhatsApp Web con mensaje)
$mensajeWhatsApp = rawurlencode("*=====----- Nueva cotización =====-----*\n\n*Datos del cliente*\n*Nombre:* $nombre\n*Empresa:* $nombreEmpresa\n*Teléfono:* $telefono\n\n*Dirección*\n*Estado:* $estado\n*Municipio:* $municipio\n*Población:* $poblacion\n\n*Productos solicitados*\n$datallePedidosWhatsapp");

if ($correoEnviado) {
    echo json_encode([
      'success' => true,
      'whatsapp_link' => "https://wa.me/5217221417838?text=$mensajeWhatsApp",
      'message' => "Tu cotización ha sido recibida.\nEn breve, nuestro equipo se pondrá en contacto contigo para ofrecerte una atención personalizada."
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'No se pudo enviar el correo.']);
}
