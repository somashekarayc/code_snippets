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
if($_POST){

require_once('JsonCrud.php'); // Assuming JsonCrud.php is in the same directory

try {
    // Create a new JSON file object with desired path and filename
    $jsonCrud = new JsonCrud('db/data.json'); // Replace with your desired filename

    // Get data from the form using $_POST
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Prepare data for insertion
    $data = [
        'name' => $name,
        'email' => $email,
    ];

    // Create new data using the JsonCrud object
    $jsonCrud->create($data);

    // Success message (optional)
    echo "Data inserted successfully!";

} catch (JsonCrudException $e) {
    // Error handling
    echo "Error: " . $e->getMessage();
}
}



// // Example usage
// try {
//     $jsonCrud = new JsonCrud('db/data.json'); // Replace with your path

//     // Create
//     $data = ['name' => 'John Doe', 'email' => 'johndoe@example.com'];
//     $jsonCrud->create($data);
    

//     // Read (get all)
//     $allData = $jsonCrud->getAll();
//     print_r($allData);

//     // Read (get one)
//     $id = '123'; // Replace with actual ID
//     $oneData = $jsonCrud->getOne($id);
//     print_r($oneData);

//     // Update
//     $id = '123'; // Replace with actual ID
//     $updateData = ['email' => 'new_email@example.com'];
//     $jsonCrud->update($id, $updateData);

//     // Delete
//     $id = '123'; // Replace with actual ID
//     $jsonCrud->delete($id);
// } catch (JsonCrudException $e) {
//     echo "Error: " . $e->getMessage();
// }

?>
