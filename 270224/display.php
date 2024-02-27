<?php
if($_POST){

require_once('JsonCrud.php'); // Assuming JsonCrud.php is in the same directory

// Example usage
try {
    $jsonCrud = new JsonCrud('db/data.json'); // Replace with your path
    
    // Read (get all)
    $allData = $jsonCrud->getAll();
    print_r($allData);

} catch (JsonCrudException $e) {
    echo "Error: " . $e->getMessage();
}

}
