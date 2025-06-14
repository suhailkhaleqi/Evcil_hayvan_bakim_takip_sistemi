<?php

include "includes/config.php";
include "includes/auth.php";

$stmt = $db->prepare("SELECT * FROM pets WHERE user_id = ?");
$stmt->execute([$_SESSION["user_id"]]);
$pets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Evcil Hayvan Takip</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Hoş Geldiniz, <?php echo $_SESSION["username"]; ?>!</h1>
            <a href="logout.php" class="btn btn-danger">Çıkış Yap</a>
        </div>
        
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h3 class="mb-0">Evcil Hayvanlarınız</h3>
            </div>
            <div class="card-body">
                <a href="add_pet.php" class="btn btn-primary mb-3">Yeni Hayvan Ekle</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ad</th>
                            <th>Tür</th>
                            <th>Doğum Tarihi</th>
                            <th>Aşı Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pets as $pet): ?>
                            <tr>
                                <td><?php echo $pet["id"]; ?></td>
                                <td><?php echo $pet["pet_name"]; ?></td>
                                <td><?php echo $pet["pet_type"]; ?></td>
                                <td><?php echo $pet["birth_date"]; ?></td>
                                <td><?php echo $pet["vaccine_date"]; ?></td>
                                <td>
                                    <a href="edit_pet.php?id=<?php echo $pet["id"]; ?>" class="btn btn-sm btn-warning">Düzenle</a>
                                    <a href="delete_pet.php?id=<?php echo $pet["id"]; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>