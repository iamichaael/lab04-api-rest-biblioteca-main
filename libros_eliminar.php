<body>
<html>
    <?php    
    // Obtengo el id del libro
    $id = $_GET['id'];

    // URL de la API (endpoint)
	require_once __DIR__ . '/config.php';
	global $config;
	$url = $config['endpoint_url']."/".$id;

    // Usamos cURL para hacer la solicitud 
    $ch = curl_init($url);

    // Configuramos la solicitud cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); // Especificamos que es una solicitud DELETE
    
    // Ejecutamos la solicitud y obtenemos la respuesta
    $response = curl_exec($ch);

    // Verificamos si hubo un error
    if (curl_errno($ch)) {
        echo 'Error en la solicitud cURL: ' . curl_error($ch);
        curl_close($ch);
        exit;
    }

    // Decodificamos la respuesta JSON de la API
    $response_data = json_decode($response, true);

    // Cerramos la conexión cURL
    curl_close($ch);


    // Verificamos si la respuesta de la API indica éxito
	if ($response_data['status']==200) {
        echo "Libro eliminado correctamente.";
    } else {
        echo "Error al eliminar el libro.";
    }
	
	echo "<script>alert('Libro eliminado correctamente'); window.location.href='index.php';</script>";
	
    ?>

</body>
</html>
