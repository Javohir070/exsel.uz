<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Search;
class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = [];
        $databaseName = env('DB_DATABASE');

        // Barcha jadvallarni olish
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = $table->{"Tables_in_{$databaseName}"};

            // Har bir jadvalda ustunlarni olish
            $columns = DB::getSchemaBuilder()->getColumnListing($tableName);

            foreach ($columns as $column) {
                try {
                    $result = DB::table($tableName)
                        ->select(DB::raw("'{$tableName}' as table_name"), "{$tableName}.*")
                        ->where($column, 'LIKE', "%{$query}%")
                        ->get();

                    if ($result->isNotEmpty()) {
                        foreach ($result as $row) {
                            $results[] = $row;
                        }
                    }
                } catch (\Exception $e) {
                    // Ignoring tables that cause errors (e.g., tables without the specified column)
                    continue;
                }
            }
        }
        
        return view('search.results', compact('results', 'query'));
    }
}
