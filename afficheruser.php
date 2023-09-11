
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Utilisateurs</title>
    <style>
        /* Votre CSS personnalisé va ici */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .delete-link {
            color: #ff0000;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Si la connexion à la base de données est réussie, vous pouvez exécuter la requête SQL
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    // Début du tableau HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Nom d'utilisateur</th><th>Email</th><th>accounttype</th><th>Actions</th></tr>";

    // Afficher les résultats sous forme de tableau HTML
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["accounttype"] . "</td>";
       echo '<td><a href="update.php?id=' . $row["id"] . '">Mettre à jour</a> | <a href="delete.php?id=' . $row["id"] . '" class="delete-link">Supprimer</a></td>';

    }

    // Fin du tableau HTML
    echo "</table>";

    // N'oubliez pas de fermer la connexion à la base de données lorsque vous avez terminé
    $conn->close();
    ?>
</body>
</html>
 <style> dans la section <head> du fichier HTML généré par PHP. Cette approche permet d'intégrer directement le CSS dans la page PHP sans avoir besoin d'un fichier CSS externe. Vous pouvez personnaliser davantage le CSS selon vos besoins.







