<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    public function export()
    {
        $filename = "data_" . date('Y-m-d') . ".csv";
        $handle = fopen('php://output', 'w');
        $columns = [];

        // Jadval nomi
        $table = "tashkilots";

        // Ma'lumotlarni olish
        $users = DB::table($table)->get();

        if ($users->isEmpty()) {
            return response()->json(['message' => 'No data found'], 404);
        }

        // Sarlavhalarni yozish
        $columns = array_keys((array)$users->first());
        fputcsv($handle, $columns);

        // Ma'lumotlarni yozish
        foreach ($users as $row) {
            fputcsv($handle, (array)$row);
        }

        // Faylni ko'chirib olish uchun tayyorlash
        fclose($handle);
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        return Response::make('', 200, $headers);
    }
}
