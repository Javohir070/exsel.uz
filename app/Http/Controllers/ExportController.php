<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    public function export()
    {
        $servername = "localhost";
        $username = "suhrob";
        $password = "123P@ssw0rd";
        $dbname = "exsel";

        // Bazaga ulanish
        $conn = new \mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Jadval nomi
        $table = "users";

        // Ma'lumotlarni olish
        $sql = "SELECT * FROM $table";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $delimiter = ",";
            $filename = "data_" . date('Y-m-d') . ".csv";

            // Faylni ochish
            $f = fopen('php://memory', 'w');

            // Sarlavhalarni yozish
            $fields = $result->fetch_fields();
            $header = array();
            foreach ($fields as $field) {
                $header[] = $field->name;
            }
            fputcsv($f, $header, $delimiter);

            // Ma'lumotlarni yozish
            while ($row = $result->fetch_assoc()) {
                $line = array();
                foreach ($header as $col) {
                    $line[] = $row[$col];
                }
                fputcsv($f, $line, $delimiter);
            }

            // Faylni ko'chirib olish
            fseek($f, 0);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');
            fpassthru($f);
        }
        exit;
    }
}
