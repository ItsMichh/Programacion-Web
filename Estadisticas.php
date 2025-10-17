<?php
$alumnos = ["Azucena","Araceli","Amalia","Azul","Areli","Amanda","Ariana", "Belinda","Mia","Imelda"];

$total = 0; 
$suma = 0;
$aprobados = 0;
$reprobados = 0;
$np = 0;
$areaOp = [];
$mCalif = 0;
$pCalif = 0;
//$mAlumno = "";
//$pAlumno = "";

foreach ($alumnos as $alumno) {
    $campo = "cbo" . $alumno;

    $calif = $_POST[$campo];

    if ($calif === "NP") {
        $np++;
        continue;
    }

    $califNum = (int)$calif;

    $suma += $califNum;
    $total++;

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
        //$mAlumno = $alumno;
    }

    if ($califNum < $pCalif) {
        $pCalif = $califNum;
        //$pAlumno = $alumno;
    }
}

$aprovechamiento = ($total > 0) ? $suma / $total : 0;
$porcAprob = ($total > 0) ? ($aprobados / $total) * 100 : 0;
$porcReprob = ($total > 0) ? ($reprobados / $total) * 100 : 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Estadísticas de Calificaciones</title>
</head>
<body>
    <h1>Estadísticas Generales</h1>

    <?php if ($np > 0): ?>
        <p><b>Nota:</b> Hay <?php echo $np; ?> alumno(s) con <b>NP</b> (No Presentó).</p>
    <?php endif; ?>

    <?php if ($total > 0): ?>
        <ul>
            <li><b>Aprovechamiento general:</b> <?php echo number_format($aprovechamiento, 2); ?></li>
            <li><b>% Aprobados:</b> <?php echo number_format($porcAprob, 2); ?>%</li>
            <li><b>% Reprobados:</b> <?php echo number_format($porcReprob, 2); ?>%</li>
            <li><b>Mejor calificación:</b> <?php echo $mCalif ; ?></li>
            <li><b>Peor calificación:</b> <?php echo $pCalif ; ?></li>
        </ul>

        <b>Alumnos en "Área de oportunidad" (6 o 7)</b>
        <?php if (count($areaOp) > 0): ?>
            <ul>
                <?php foreach ($areaOp as $a): ?>
                    <li><?php echo $a; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No hay alumnos en área de oportunidad.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>No hay calificaciones válidas para calcular estadísticas.</p>
    <?php endif; ?>

    <br>
    <a href="CasoPractico1.php">Volver</a>
</body>
</html>
