<?php
require_once 'Orm.php';

require_once 'MyXmlParser.php'; // Include the new class file


// Usage Example
$parser = new MyXmlParser('dump_data.xml');
$data = $parser->parse();

// Create a new ORM instance to interact with the database
$orm = new Orm('db', 'xml_data', 'user', 'password');

// Insert product data into the 'products' table
$productId = $orm->insert('products', $data['productData']);

// Insert details data into the 'details_data' table
foreach ($data['details'] as $detail) {
    $detail['product_id'] = $productId;  // Link each detail with the product
    $orm->insert('details_data', $detail);
}



echo "Database populated successfully!";
