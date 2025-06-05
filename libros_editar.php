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
    
    // Ejecutamos la solicitud y obtenemos la respuesta
    $response = curl_exec($ch);
    
    // Verificamos si hubo un error
    if (curl_errno($ch)) {
        echo 'Error en la solicitud cURL: ' . curl_error($ch);
        curl_close($ch);
        exit;
    }

    // Decodificamos la respuesta JSON 
    $data = json_decode($response, true);

    if (isset($data['data']) && is_array($data['data'])) {
        $libro = $data['data'];
    } else {
        $libro = [];
    }

    // Cerramos la conexión cURL
    curl_close($ch);

    // Verificamos si el libro fue encontrado
    if (!$libro) {
        die("Libro no encontrado.");
    }

    // Mostramos el formulario para editar el libro
    echo "<center><form name='formulario' action='libros_actualizar.php' method='post'>";
    echo "<table border=0 width=500>";
    echo "<tr>";
    echo "<td bgcolor=#cccccc><b> id </b></td> <td>" . $libro["id"] . " <input type=hidden name=id value='" . $libro["id"] . "'> </td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td bgcolor=#cccccc><b> Título </b></td> <td><input type=text name=titulo value='" . $libro["title"] . "'></td>";
    echo "</tr>";        

    echo "<tr>";
    echo "<td bgcolor=#cccccc><b> Autor </b></td> <td><input type=text name=autor value='" . $libro["author"] . "'></td>";
    echo "</tr>";    

    echo "<tr>";
    echo "<td bgcolor=#cccccc><b> Editorial </b></td> <td><input type=text name=editorial value='" . $libro["publisher"] . "'></td>";
    echo "</tr>";    

    echo "<tr>";
    echo "<td bgcolor=#cccccc><b> PublicadoEn </b></td> <td><input type=text name=publicadoEn value='" . $libro["publishedIn"] . "'></td>";
    echo "</tr>";    

    echo "<tr><td colspan=2><br><center> <input type=submit></td></tr>";    
    echo "</table></center>";

    ?>
</body>
</html>
