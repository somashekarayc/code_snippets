<?php
class JsonCrudException extends Exception {
    public function __construct(string $message, int $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}

class JsonCrud {
    private $filePath;

    public function __construct(string $filePath) {
        $this->filePath = $filePath;
        $this->checkFileExists($filePath);
    }

    private function checkFileExists(string $filePath): void {
        if (!file_exists($filePath)) {
            throw new JsonCrudException("File '$filePath' does not exist.");
        }
    }

    private function loadJsonData(): array {
        $jsonData = file_get_contents($this->filePath);
        if ($jsonData === false) {
            throw new JsonCrudException("Failed to read JSON data from '$this->filePath'.");
        }
        return json_decode($jsonData, true, 512, JSON_THROW_ON_ERROR); // Strict decoding with options
    }

    private function writeJsonData(array $data): void {
        $encodedData = json_encode($data, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);
        if (file_put_contents($this->filePath, $encodedData) === false) {
            throw new JsonCrudException("Failed to write JSON data to '$this->filePath'.");
        }
    }

    public function getAll(): array {
        return $this->loadJsonData();
    }

    public function getOne(string $id): array {
        $data = $this->loadJsonData();
        foreach ($data as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }
        throw new JsonCrudException("Item with ID '$id' not found.");
    }

    public function create(array $data): void {
        $data['model'] = 'users';
        $data['id'] = uniqid(); // Generate unique ID
        $existingData = $this->loadJsonData();
        $existingData[] = $data;
        $this->writeJsonData($existingData);
    }

    public function update(string $id, array $data): void {
        $existingData = $this->loadJsonData();
        $found = false;
        foreach ($existingData as &$item) {
            if ($item['id'] === $id) {
                $item = array_merge($item, $data); // Merge with existing data
                $found = true;
                break;
            }
        }
        if (!$found) {
            throw new JsonCrudException("Item with ID '$id' not found.");
        }
        $this->writeJsonData($existingData);
    }

    public function delete(string $id): void {
        $existingData = $this->loadJsonData();
        $newData = [];
        foreach ($existingData as $item) {
            if ($item['id'] !== $id) {
                $newData[] = $item;
            }
        }
        if (count($newData) === count($existingData)) {
            throw new JsonCrudException("Item with ID '$id' not found.");
        }
        $this->writeJsonData($newData);
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