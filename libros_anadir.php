<!DOCTYPE html>
<html>
<head>
    <title>Añadir Libro</title>
</head>
<body>
    <center>
        <h2>Añadir Nuevo Libro</h2>
        <form name="formulario" action="libros_guardar.php" method="post">
            <table border="0" width="500">
                <tr>
                    <td bgcolor="#cccccc"><b>Título</b></td>
                    <td><input type="text" name="titulo" required></td>
                </tr>
                <tr>
                    <td bgcolor="#cccccc"><b>Autor</b></td>
                    <td><input type="text" name="autor" required></td>
                </tr>
                <tr>
                    <td bgcolor="#cccccc"><b>Editorial</b></td>
                    <td><input type="text" name="editorial" required></td>
                </tr>
                <tr>
                    <td bgcolor="#cccccc"><b>Publicado En</b></td>
                    <td><input type="text" name="publicadoEn" required></td>
                </tr>
                <tr>
                    <td colspan="2"><br><center><input type="submit" value="Agregar Libro"></center></td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>
