<?php
include("connexio.php");
include("header.php");

$missatge = "";

if (!isset($_GET["id"])) {
    echo "<div class='alert alert-danger'>No s'ha indicat cap incidència</div>";
    include("footer.php");
    exit;
}

$id_incidencia = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dataActuacio = $_POST["dataActuacio"];
    $descripcioActuacio = $_POST["descripcioActuacio"];
    $tempsInvertit = $_POST["tempsInvertit"];

    if (!empty($dataActuacio) && !empty($descripcioActuacio) && !empty($tempsInvertit)) {
        $sql = $conn->prepare("INSERT INTO actuacio (id_incidencia, data_actuacio, descripcio, temps_invertit) VALUES (?, ?, ?, ?)");
        $sql->bind_param("issi", $id_incidencia, $dataActuacio, $descripcioActuacio, $tempsInvertit);

        if ($sql->execute()) {
            $missatge = "<div class='alert alert-success'>Actuació registrada correctament</div>";
        } else {
            $missatge = "<div class='alert alert-danger'>Error en registrar l'actuació</div>";
        }
    } else {
        $missatge = "<div class='alert alert-warning'>Tots els camps són obligatoris</div>";
    }
}
?>

<h1>AFEGIR ACTUACIÓ</h1>

<?php echo $missatge; ?>

<form action="afegir_actuacio.php?id=<?php echo $id_incidencia; ?>" method="post">
    <div>
        <label for="dataActuacio">Data actuació</label>
        <input type="date" id="dataActuacio" name="dataActuacio" required>
    </div>

    <div>
        <label for="descripcioActuacio">Descripció actuació</label>
        <textarea id="descripcioActuacio" name="descripcioActuacio" rows="5" required></textarea>
    </div>

    <div>
        <label for="tempsInvertit">Temps invertit (min)</label>
        <input type="number" id="tempsInvertit" name="tempsInvertit" required>
    </div>

    <div>
        <button type="submit" class="btn-custom btn-principal">Enviar actuació</button>
    </div>
</form>

<?php include("footer.php"); ?>