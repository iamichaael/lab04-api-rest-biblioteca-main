<?php

    // Obtengo los datos del formulario
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $publicadoEn = $_POST['publicadoEn'];
	
 
    // Datos del libro recibidos desde el formulario
    $data = array(
        "title" => $_POST['titulo'],
        "author" => $_POST['autor'],
        "publisher" => $_POST['editorial'],
        "publishedIn" => $_POST['publicadoEn']
    );

    // Codificamos los datos a JSON
    $json_data = json_encode($data);

    // URL de la API (endpoint)
	require_once __DIR__ . '/config.php';
	global $config;
	$url = $config['endpoint_url'];
	

    // Inicializar cURL
    $ch = curl_init($url);

    // Configurar opciones de cURL para POST
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json_data)
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

    // Ejecutar la solicitud
    $response = curl_exec($ch);
	
    // Verificar errores
    if (curl_errno($ch)) {
        echo 'Error en la solicitud cURL: ' . curl_error($ch);
        curl_close($ch);
        exit;
    }

    // Cerrar cURL
    curl_close($ch);

    // Mostrar respuesta o redirigir
	echo "<script>alert('Libro agregado correctamente'); window.location.href='index.php';</script>";
?>
