<?php
include("connexio.php");
include("header.php");

$missatge = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $departament = $_POST["departament"];
    $prioritat = $_POST["prioritat"];
    $descripcio = $_POST["descripcio"];

    if (!empty($departament) && !empty($prioritat) && !empty($descripcio)) {
        $sql = $conn->prepare("INSERT INTO incidencia (departament, prioritat, descripcio) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $departament, $prioritat, $descripcio);

        if ($sql->execute()) {
            $missatge = "<div class='alert alert-success'>Incidència creada correctament</div>";
        } else {
            $missatge = "<div class='alert alert-danger'>Error en crear la incidència</div>";
        }
    } else {
        $missatge = "<div class='alert alert-warning'>Tots els camps són obligatoris</div>";
    }
}
?>

<h1>CREA LA TEVA INCIDÈNCIA</h1>

<?php echo $missatge; ?>

<form action="crear_incidencia.php" method="post">
    <div>
        <label for="departament">Departament:</label>
        <input type="text" id="departament" name="departament" required>
    </div>

    <div>
        <label for="prioritat">Prioritat:</label>
        <select id="prioritat" name="prioritat" required>
            <option value="">Selecciona una prioritat</option>
            <option value="baixa">Baixa</option>
            <option value="mitja">Mitja</option>
            <option value="alta">Alta</option>
        </select>
    </div>

    <div>
        <label for="descripcio">Descripció de la incidència:</label>
        <textarea id="descripcio" name="descripcio" rows="6" required></textarea>
    </div>

    <div>
        <button type="submit" class="btn-custom btn-principal">CREA LA TEVA INCIDÈNCIA</button>
    </div>
</form>

<?php include("footer.php"); ?>