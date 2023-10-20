<?php
try {
    $bdd = new PDO("pgsql:host=bdd;port=5432;dbname=postgres;user=postgres;password=postgres");
    // Configurer les options de PDO si nécessaire
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>