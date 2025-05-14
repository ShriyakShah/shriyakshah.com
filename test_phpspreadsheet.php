<?php
// Check if Composer autoloader exists
if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    die("Composer autoloader not found. Please run 'composer require phpoffice/phpspreadsheet' to install the package.");
}

// Try to load the autoloader
require __DIR__ . '/vendor/autoload.php';

// Check if PhpSpreadsheet classes exist
if (!class_exists('PhpOffice\\PhpSpreadsheet\\Spreadsheet')) {
    die("PhpSpreadsheet class not found. Please make sure you have installed it correctly using Composer.");
}

echo "PhpSpreadsheet is correctly installed and accessible!";
echo "<br><br>";
echo "Available PhpSpreadsheet classes:<br>";
echo "- PhpOffice\\PhpSpreadsheet\\Spreadsheet: " . (class_exists('PhpOffice\\PhpSpreadsheet\\Spreadsheet') ? "Available" : "Not available");
echo "<br>";
echo "- PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx: " . (class_exists('PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx') ? "Available" : "Not available");
?> 