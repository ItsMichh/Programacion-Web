/*
    CASO PRACTICO

    Un profesor tiene 10 alumnos a los cuales les debe poder capturar 
    su calificacion. Al enviar la informacion, el profesor obtiene 
    las siguientes estadisticas: 
    - Aprovechamiento General. (Promedio)
    - % de Aprobados y Reprobados.
    - Peor y Mejor calificacion.
    - Alumnos en "Area de oportunidad".
    * Los alumnos con NP NO deben contabilizarse, pero si notificarse.

    ENTREGA: Sesion Teorica
    Individua o Parejas
    Infinityfree (hosting) o en una laptop (no prestable) con IIS
    Codigo fuente debe estar en GitHub
*/

<?php
    $alumnos = ["Azucena","Araceli","Amalia","Azul","Areli","Amanda","Ariana", "Belinda","Mia","Imelda"];
    $calificaciones = ["0","1","2","3","4","5","6","7","8","9","10","NP"];
?>
<!DOCTYPE html>
<html> 
    <head></head>
    <body>
        <h1> Mis alumnos </h1>
        <form method="POST" .  action="Estadisticas.php">
            <table border>
                <tr>
                    <th> Nombre </th>
                    <th> Calificacion </th>
                </tr>
                <?php foreach ($alumnos as $alumno): ?>
                <tr>
                    <td>
                        <label> <?php echo $alumno ?> </label>
                    </td>
                    <td>
                        <select name="cbo<?php echo $alumno ?>">
                            <?php foreach ($calificaciones as $calif): ?>
                            <option><?php echo $calif?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <?php endforeach; ?>
                </tr>
            </table>
            <input type="submit">
        </form>
    </body>
</html>

