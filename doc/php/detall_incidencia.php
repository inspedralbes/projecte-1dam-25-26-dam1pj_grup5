<?php
include("connexio.php");
include("header.php");

if (!isset($_GET["id"])) {
    echo "<div class='alert alert-danger'>No s'ha indicat cap incidència</div>";
    include("footer.php");
    exit;
}

$id = $_GET["id"];

$sql = $conn->prepare("SELECT * FROM incidencia WHERE id = ?");
$sql->bind_param("i", $id);
$sql->execute();
$resultat = $sql->get_result();
$incidencia = $resultat->fetch_assoc();

if (!$incidencia) {
    echo "<div class='alert alert-danger'>Incidència no trobada</div>";
    include("footer.php");
    exit;
}
?>

<h1>DETALL DE LA INCIDÈNCIA</h1>

<p><strong>ID:</strong> <?php echo $incidencia["id"]; ?></p>
<p><strong>Departament:</strong> <?php echo $incidencia["departament"]; ?></p>
<p><strong>Prioritat:</strong> <?php echo $incidencia["prioritat"]; ?></p>
<p><strong>Descripció:</strong> <?php echo $incidencia["descripcio"]; ?></p>

<a href="afegir_actuacio.php?id=<?php echo $incidencia["id"]; ?>" class="btn-custom btn-principal">Afegir actuació</a>

<?php include("footer.php"); ?>