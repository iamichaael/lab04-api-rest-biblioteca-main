<body>
<html>
    <?php	
    
    // Obtengo los datos del formulario
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $publicadoEn = $_POST['publicadoEn'];
    
    // Preparo los datos que enviaré a la API
    $data = array(
        'id' => $id,
        'title' => $titulo,
        'author' => $autor,
        'publisher' => $editorial,
        'publishedIn' => $publicadoEn
    );
    
    // URL de la API (endpoint)
	require_once __DIR__ . '/config.php';
	global $config;
	$url = $config['endpoint_url']."/".$id;
    
    // Usamos cURL para enviar la solicitud
    $ch = curl_init($url);
    
    // Configuración para una solicitud PUT (puedes cambiar a POST si es el caso)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); // O "POST" si es el caso
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Convertimos los datos a JSON
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen(json_encode($data))
    ));
    
    // Ejecutamos la solicitud
    $response = curl_exec($ch);
    
    // Verificamos si hubo un error
    if(curl_errno($ch)) {
        echo 'Error en la solicitud cURL: ' . curl_error($ch);
    } else {
        // Procesamos la respuesta de la API
        if ($response) {
            $response_data = json_decode($response, true);						
			
            if ($response_data['status']==200) {
                echo "Libro actualizado correctamente";
                echo "  <script type='text/javascript'>
                            window.location.href='libros_mostrar.php';
                        </script>";
            } else {
                echo "Error al actualizar el libro: " . $response_data['message'];
            }
        } else {
            echo "Error en la respuesta de la API.";
        }
    }
    
    // Cerramos la conexión cURL
    curl_close($ch);
    ?>
</body>
</html>
