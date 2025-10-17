<?php
$alumnos = ["Azucena","Araceli","Amalia","Azul","Areli","Amanda","Ariana", "Belinda","Mia","Imelda"];

$valid = 0; 
$suma = 0;
$aprobados = 0;
$reprobados = 0;
$np = 0;
$areaOp = [];
$mCalif = 0;
$pCalif = 0;

foreach ($alumnos as $alumno) {
    $campo = "cbo" . $alumno;

    $calif = $_POST[$campo];

    if ($calif === "NP") {
        $np++;
        continue;
    }

    $califNum = (int)$calif;

    $suma += $califNum;
    $valid++;

    if ($califNum >= 6) {
        $aprobados++;
    } else {
        $reprobados++;
    }

    if ($califNum == 6 || $califNum == 7) {
        $areaOp[] = $alumno;
    }

    if ($califNum > $mCalif) {
        $mCalif = $califNum;
    }

    if ($califNum < $pCalif) {
        $pCalif = $califNum;
    }
}

$aprovechamiento = ($valid > 0) ? $suma / $valid : 0;
$porAp = ($valid > 0) ? ($aprobados / $valid) * 100 : 0;
$porRep = ($valid > 0) ? ($reprobados / $valid) * 100 : 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calificaciones</title>
</head>
<body>
    <h1>Estadísticas Generales</h1>

    <?php if ($np > 0): ?>
        <p><b>Nota:</b> Hay <?php echo $np; ?> alumno(s) con <b>NP</b> (No Presentó).</p>
    <?php endif; ?>

    <?php if ($valid > 0): ?>
        <ul>
            <li><b>Aprovechamiento general:</b> <?php echo number_format($aprovechamiento, 2); ?></li>
            <li><b>% Aprobados:</b> <?php echo number_format($porAp, 2); ?>%</li>
            <li><b>% Reprobados:</b> <?php echo number_format($porRep, 2); ?>%</li>
            <li><b>Mejor calificación:</b> <?php echo $mCalif ; ?></li>
            <li><b>Peor calificación:</b> <?php echo $pCalif ; ?></li>
        </ul>

        <b>Alumnos en área de oportunidad (6 - 7)</b>
        <?php if (count($areaOp) > 0): ?>
            <ul>
                <?php foreach ($areaOp as $aO): ?>
                    <li><?php echo $aO; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No hay alumnos en área de oportunidad.</p>
        <?php endif; ?>
    <?php endif; ?>
    <br>
    <a href="CasoPractico1.php">Volver</a>
</body>
</html>


