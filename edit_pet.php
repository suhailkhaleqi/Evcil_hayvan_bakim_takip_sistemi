<?php
include "includes/config.php";
include "includes/auth.php";

if (!isset($_GET["id"])) {
    header("Location: dashboard.php");
    exit();
}

$pet_id = $_GET["id"];
$stmt = $db->prepare("SELECT * FROM pets WHERE id = ? AND user_id = ?");
$stmt->execute([$pet_id, $_SESSION["user_id"]]);
$pet = $stmt->fetch();

if (!$pet) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST["pet_name"];
    $pet_type = $_POST["pet_type"];
    $birth_date = $_POST["birth_date"];
    $vaccine_date = $_POST["vaccine_date"];
    $notes = $_POST["notes"];

    $stmt = $db->prepare("UPDATE pets SET pet_name = ?, pet_type = ?, birth_date = ?, vaccine_date = ?, notes = ? WHERE id = ?");
    $stmt->execute([$pet_name, $pet_type, $birth_date, $vaccine_date, $notes, $pet_id]);
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Hayvan Düzenle</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-warning text-white">
                        <h3 class="text-center">Hayvan Düzenle</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="pet_name" class="form-label">Hayvan Adı</label>
                                <input type="text" class="form-control" name="pet_name" value="<?php echo $pet["pet_name"]; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="pet_type" class="form-label">Türü</label>
                                <select class="form-select" name="pet_type" required>
                                    <option value="Köpek" <?php if ($pet["pet_type"] == "Köpek") echo "selected"; ?>>Köpek</option>
                                    <option value="Kedi" <?php if ($pet["pet_type"] == "Kedi") echo "selected"; ?>>Kedi</option>
                                    <option value="Kuş" <?php if ($pet["pet_type"] == "Kuş") echo "selected"; ?>>Kuş</option>
                                    <option value="Diğer" <?php if ($pet["pet_type"] == "Diğer") echo "selected"; ?>>Diğer</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="birth_date" class="form-label">Doğum Tarihi</label>
                                <input type="date" class="form-control" name="birth_date" value="<?php echo $pet["birth_date"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="vaccine_date" class="form-label">Aşı Tarihi</label>
                                <input type="date" class="form-control" name="vaccine_date" value="<?php echo $pet["vaccine_date"]; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notlar</label>
                                <textarea class="form-control" name="notes" rows="3"><?php echo $pet["notes"]; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-warning w-100">Güncelle</button>
                        </form>
                    </div>
                </div>
                <a href="dashboard.php" class="btn btn-secondary mt-3">Geri Dön</a>
            </div>
        </div>
    </div>
</body>
</html>