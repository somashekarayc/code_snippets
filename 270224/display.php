<?php

require_once('JsonCrud.php');

try {
    $jsonCrud = new JsonCrud('db/data.json'); // Replace with your path

    $jsonData = $jsonCrud->getAll();

    $users = array_filter($jsonData, function ($user) {
        return $user["model"] === "users"; // Strict comparison
    });
} catch (JsonCrudException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($users as $user) { ?>
                    <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>