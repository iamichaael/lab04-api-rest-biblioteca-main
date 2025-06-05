<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Libros</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Lista de Libros</h2>
	<div align=right> <a href=libros_anadir.php> Añadir libro </a> </div>
	
    <?php
    // URL de la API (endpoint)
	require_once __DIR__ . '/config.php';
	global $config;
	$url = $config['endpoint_url'];
	
    
    // Usamos cURL para hacer la solicitud 
    $ch = curl_init($url);
    
    // Configuramos la solicitud cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Ejecutamos la solicitud y obtenemos la respuesta
    $response = curl_exec($ch);
    
    // Verificamos si hubo un error
    if(curl_errno($ch)) {
        echo 'Error en la solicitud cURL: ' . curl_error($ch);
        curl_close($ch);
        exit;
    }
    
    // Decodificamos la respuesta JSON    
    $data = json_decode($response, true);

    if (isset($data['data']) && is_array($data['data'])) {
        $libros = $data['data'];
    } else {
        $libros = [];
    }


    // Cerramos la conexión cURL
    curl_close($ch);

    // Comprobamos si la API devolvió resultados
    if (is_array($libros) && count($libros) > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Editorial</th>
                    <th>PublicadoEn</th>
                    <th>Acciones</th>
                </tr>";
        foreach ($libros as $libro) {
            echo "<tr>
                    <td>{$libro['id']}</td>
                    <td>{$libro['title']}</td>
                    <td>{$libro['author']}</td>
                    <td>{$libro['publisher']}</td>
                    <td>{$libro['publishedIn']}</td>
                    <td> 
                        <a href='libros_eliminar.php?id={$libro['id']}'> <img src='./iconos/ico_eliminar.gif' alt='Eliminar'> </a>
                        <a href='libros_editar.php?id={$libro['id']}'> <img src='./iconos/ico_editar.gif' alt='Editar'> </a>				
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align:center;'>No hay libros en la base de datos.</p>";
    }
    ?>
</body>
</html>
