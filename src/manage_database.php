<?php
require_once 'Orm.php';
require_once 'MyXmlParser.php';

// Database connection
$orm = new Orm('db', 'xml_data', 'user', 'password');

// Check if command is passed
if ($argc < 2) {
    echo "Usage: php manage_database.php [insert|update|delete] [table] [data]\n";
    exit(1);
}

$command = $argv[1];
$table = $argv[2];

switch ($command) {
    case 'insert':
        if ($argc < 4) {
            echo "Usage: php manage_database.php insert [table] [data]\n";
            exit(1);
        }
        $data = json_decode($argv[3], true);  // Assuming data is passed as JSON string
        if ($data === null) {
            echo "Invalid data format. Please provide valid JSON data.\n";
            exit(1);
        }
        $orm->insert($table, $data);
        echo "Data inserted into $table.\n";
        break;

    case 'update':
        if ($argc < 5) {
            echo "Usage: php manage_database.php update [table] [data] [condition]\n";
            exit(1);
        }
        $data = json_decode($argv[3], true);
        $condition = $argv[4];
        if ($data === null) {
            echo "Invalid data format. Please provide valid JSON data.\n";
            exit(1);
        }
        $orm->update($table, $data, $condition);
        echo "Data updated in $table.\n";
        break;

    case 'delete':
        if ($argc < 4) {
            echo "Usage: php manage_database.php delete [table] [condition]\n";
            exit(1);
        }
        $condition = $argv[3];
        $orm->delete($table, $condition);
        echo "Data deleted from $table.\n";
        break;

    default:
        echo "Unknown command: $command\n";
        exit(1);
}
?>
