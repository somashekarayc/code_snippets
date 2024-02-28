<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create New Data</title>
</head>

<body>
    <h1>Create New Data</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br><br>
        <button type="submit">Create</button>
    </form>
</body>

</html>
<?php

if ($_POST) {

    require_once('JsonCrud.php');

    try {
        $jsonCrud = new JsonCrud('db/data.json');

        $jsonCrud->create($_POST);

        header("Refresh:0");
        // Success message (optional)
        echo "Data inserted successfully!";
    } catch (JsonCrudException $e) {
        // Error handling
        echo "Error: " . $e->getMessage();
    }
}
