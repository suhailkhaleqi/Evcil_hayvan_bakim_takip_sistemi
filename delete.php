<?php
// 1. Oturum ve veritabanı bağlantısı
require __DIR__.'/includes/config.php';

// 2. Parametre kontrolü
if(empty($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: dashboard.php?error=invalid_id");
    exit;
}

// 3. Silme işlemi
try {
    $db->prepare("DELETE FROM pets WHERE id=? AND user_id=?")
       ->execute([$_GET['id'], $_SESSION['user_id']]);
    
    header("Location: dashboard.php?success=deleted");
} catch(PDOException $e) {
    header("Location: dashboard.php?error=db_error");
}
exit;
?>