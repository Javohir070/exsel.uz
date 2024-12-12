<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
class PDFController extends Controller
{
    public function generatePDF()
    {
        $users = User::where('id', 1000)->get();

        // Define a file name and path for the PDF
        $fileName = 'users-lists-' . time() . '.pdf';
        $fileRelativePath = 'pdfs/' . $fileName;
        $filePath = storage_path('app/public/' . $fileRelativePath);

        // Generate a URL for the PDF
        $pdfUrl = asset('storage/' . $fileRelativePath);

        // Generate the QR Code as a base64 image
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->generate($pdfUrl));

        // Prepare data for the PDF
        $data = [
            'title' => 'Welcome to Funda of Web IT - fundaofwebit.com',
            'date' => date('m/d/Y'),
            'users' => $users,
            'qrCode' => $qrCode, // Pass QR Code image as base64
        ];

        // Generate the PDF
        $pdf = PDF::loadView('admin.pdf.usersPdf', $data);

        // Save the PDF to the specified path
        if (!file_exists(storage_path('app/public/pdfs'))) {
            mkdir(storage_path('app/public/pdfs'), 0755, true);
        }
        $pdf->save($filePath);

        // Store the PDF path in the database (example for one user)
        if ($users->isNotEmpty()) {
            $user = $users->first();
            $user->pdf_path = $fileRelativePath; // Save relative path
            $user->save();
        }

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
