<?php
include "includes/config.php";
include "includes/auth.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST["pet_name"];
    $pet_type = $_POST["pet_type"];
    $birth_date = $_POST["birth_date"];
    $vaccine_date = $_POST["vaccine_date"];
    $notes = $_POST["notes"];

    $stmt = $db->prepare("INSERT INTO pets (user_id, pet_name, pet_type, birth_date, vaccine_date, notes) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$_SESSION["user_id"], $pet_name, $pet_type, $birth_date, $vaccine_date, $notes]);
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Hayvan Ekle</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center">Yeni Hayvan Ekle</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="pet_name" class="form-label">Hayvan Adı</label>
                                <input type="text" class="form-control" name="pet_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="pet_type" class="form-label">Türü</label>
                                <select class="form-select" name="pet_type" required>
                                    <option value="Köpek">Köpek</option>
                                    <option value="Kedi">Kedi</option>
                                    <option value="Kuş">Kuş</option>
                                    <option value="Diğer">Diğer</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="birth_date" class="form-label">Doğum Tarihi</label>
                                <input type="date" class="form-control" name="birth_date">
                            </div>
                            <div class="mb-3">
                                <label for="vaccine_date" class="form-label">Aşı Tarihi</label>
                                <input type="date" class="form-control" name="vaccine_date">
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notlar</label>
                                <textarea class="form-control" name="notes" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Kaydet</button>
                        </form>
                    </div>
                </div>
                <a href="dashboard.php" class="btn btn-secondary mt-3">Geri Dön</a>
            </div>
        </div>
    </div>
</body>
</html>