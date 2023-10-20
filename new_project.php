<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '#mytextarea'
            });
        </script>
    </head>

    <body>
        <form method="post" action="index.php">
            <textarea name="mytextarea" id="mytextarea"></textarea>
            <button type="submit">Submit</button>
        </form>
        <?php
        include('utils/bdd.php');
        $query = "SELECT * FROM test";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<table>";
        foreach ($result as $row) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<td>" . $key . ": " . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        ?>
    </body>
    <?php

    $test = $_POST['mytextarea'];
    // Requête SQL d'insertion
    $query = "INSERT INTO test VALUES (:test)";

    // Préparez la requête
    $stmt = $conn->prepare($query);

    // Liez les valeurs aux paramètres
    $stmt->bindParam(':test', $test);

    // Exécutez la requête
    if ($stmt->execute()) {
        echo "Données insérées avec succès.";
    } else {
        echo "Erreur lors de l'insertion des données : " . $stmt->errorInfo();
    }
    ?>

</html>