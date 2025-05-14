<?php
// Make sure the path to autoload.php is correct
require __DIR__ . '/vendor/autoload.php';

// Add proper use statements for PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

header('Content-Type: application/json');

try {
    // Get POST data
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    // Set headers if file doesn't exist
    if (!file_exists('data.xlsx')) {
        $sheet->setCellValue('A1', 'Name');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Phone');
        $sheet->setCellValue('D1', 'Message');
        $sheet->setCellValue('E1', 'Date');
    }
    
    // Get next row
    $nextRow = $sheet->getHighestRow() + 1;
    
    // Add data
    $sheet->setCellValue('A' . $nextRow, $data['name']);
    $sheet->setCellValue('B' . $nextRow, $data['email']);
    $sheet->setCellValue('C' . $nextRow, $data['phone']);
    $sheet->setCellValue('D' . $nextRow, $data['message']);
    $sheet->setCellValue('E' . $nextRow, $data['date']);
    
    // Save file
    $writer = new Xlsx($spreadsheet);
    $writer->save('data.xlsx');
    
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?> 