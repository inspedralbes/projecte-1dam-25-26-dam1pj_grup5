<?php
include("connexio.php");
include("header.php");

$resultat = $conn->query("SELECT * FROM incidencia ORDER BY id DESC");
?>

<h1>LLISTAT D'INCIDÈNCIES</h1>

<table class="taula-incidencies">
    <tr>
        <th>ID</th>
        <th>Departament</th>
        <th>Prioritat</th>
        <th>Descripció</th>
        <th>Acció</th>
    </tr>

    <?php while ($fila = $resultat->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila["id"]; ?></td>
            <td><?php echo $fila["departament"]; ?></td>
            <td><?php echo $fila["prioritat"]; ?></td>
            <td><?php echo $fila["descripcio"]; ?></td>
            <td>
                <a href="detall_incidencia.php?id=<?php echo $fila["id"]; ?>">Veure detall</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php include("footer.php"); ?>