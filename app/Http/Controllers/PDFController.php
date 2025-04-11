<?php

namespace App\Http\Controllers;

use App\Models\Asbobuskuna;
use App\Models\Asbobuskunaexpert;
use App\Models\Doktaranturaexpert;
use App\Models\IlmiyLoyiha;
use App\Models\Stajirovka;
use App\Models\Stajirovkaexpert;
use App\Models\Tashkilot;
use App\Models\Intellektual;
use App\Models\Tekshirivchilar;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
class PDFController extends Controller
{
    public function generatePDF($ilmiyId)
    {
        $ilmiyloyiha = IlmiyLoyiha::findOrFail($ilmiyId);
        $fileName = 'test-lists-' . time() . '.pdf';
        $fileRelativePath = 'pdfs/' . $fileName;
        $filePath = storage_path('app/public/' . $fileRelativePath);
    
        $intellektual = Intellektual::where('ilmiy_loyiha_id', $ilmiyId)->first();
        $pdfUrl = asset('storage/' . $fileRelativePath);
    
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->generate($pdfUrl));
    
        $data = [
            'title' => 'Welcome to Funda of Web IT - fundaofwebit.com',
            'date' => date('m/d/Y'),
            'ilmiyloyiha' => $ilmiyloyiha,
            'intellektual' => $intellektual,
            'qrCode' => $qrCode,
        ];
    
        $tekshirivchilar = Tekshirivchilar::where('is_active',1)->where('ilmiy_loyiha_id', $ilmiyloyiha->id)->first();
    
        $pdf = PDF::loadView('admin.pdf.usersPdf', $data);
    
        if (!file_exists(storage_path('app/public/pdfs'))) {
            mkdir(storage_path('app/public/pdfs'), 0755, true);
        }
    
        $pdf->save($filePath);
    
        if ($tekshirivchilar) {
            $tekshirivchilar->file = $fileRelativePath;
            $tekshirivchilar->save();
        }
    
        // Faylni yuklamasdan, faqat xabar yuboramiz
        return back()->with('status', 'PDF muvaffaqiyatli yaratildi va saqlandi.');
    }
    

    public function generatePDFsajiyor($Id)
    {
        $stajirovka = Stajirovka::findOrFail($Id);
        // Define a file name and path for the PDF
        $fileName = 'sta-lists-' . time() . '.pdf';
        $fileRelativePath = 'pdfs/' . $fileName;
        $filePath = storage_path('app/public/' . $fileRelativePath);

        // Generate a URL for the PDF
        $pdfUrl = asset('storage/' . $fileRelativePath);

        // Generate the QR Code as a base64 image
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->generate($pdfUrl));
        $tekshirivchilar = Stajirovkaexpert::where('stajirovka_id', $stajirovka->id)->first();
        // Prepare data for the PDF
        $data = [
            'title' => 'Welcome to Funda of Web IT - fundaofwebit.com',
            'date' => date('m/d/Y'),
            'stajirovka' => $stajirovka,
            'qrCode' => $qrCode, // Pass QR Code image as base64
            'tekshirivchilar' => $tekshirivchilar
        ];



        // Generate the PDF
        $pdf = PDF::loadView('admin.pdf.stajirovka', $data);

        // Save the PDF to the specified path
        if (!file_exists(storage_path('app/public/pdfs'))) {
            mkdir(storage_path('app/public/pdfs'), 0755, true);
        }
        $pdf->save($filePath);

        // Store the PDF path in the database (example for one user)
        if ($tekshirivchilar) {
            $tekshirivchilar->file = $fileRelativePath; 
            $tekshirivchilar->save();
        }

       return back()->with('status', 'PDF muvaffaqiyatli yaratildi va saqlandi.');
    }

    public function generatePDFAsbobuskuna($Id)
    {
        $asbobuskuna = Asbobuskuna::findOrFail($Id);
        // Define a file name and path for the PDF
        $fileName = 'sta-lists-' . time() . '.pdf';
        $fileRelativePath = 'pdfs/' . $fileName;
        $filePath = storage_path('app/public/' . $fileRelativePath);

        // Generate a URL for the PDF
        $pdfUrl = asset('storage/' . $fileRelativePath);

        // Generate the QR Code as a base64 image
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->generate($pdfUrl));
        $tekshirivchilar = Asbobuskunaexpert::where('asbobuskuna_id', $asbobuskuna->id)->first();
        // Prepare data for the PDF
        $data = [
            'title' => 'Welcome to Funda of Web IT - fundaofwebit.com',
            'date' => date('m/d/Y'),
            'asbobuskuna' => $asbobuskuna,
            'qrCode' => $qrCode, // Pass QR Code image as base64
            'tekshirivchilar' => $tekshirivchilar
        ];



        // Generate the PDF
        $pdf = PDF::loadView('admin.pdf.asbobuskuna', $data);

        // Save the PDF to the specified path
        if (!file_exists(storage_path('app/public/pdfs'))) {
            mkdir(storage_path('app/public/pdfs'), 0755, true);
        }
        $pdf->save($filePath);

        // Store the PDF path in the database (example for one user)
        if ($tekshirivchilar) {
            $tekshirivchilar->file = $fileRelativePath; 
            $tekshirivchilar->save();
        }

       return back()->with('status', 'PDF muvaffaqiyatli yaratildi va saqlandi.');
    }


    public function generatePDFDoktarantura($Id)
    {
        $tashkilot = Tashkilot::findOrFail($Id);
        // Define a file name and path for the PDF
        $fileName = 'sta-lists-' . time() . '.pdf';
        $fileRelativePath = 'pdfs/' . $fileName;
        $filePath = storage_path('app/public/' . $fileRelativePath);

        // Generate a URL for the PDF
        $pdfUrl = asset('storage/' . $fileRelativePath);

        // Generate the QR Code as a base64 image
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->generate($pdfUrl));
        $tekshirivchilar = Doktaranturaexpert::where('tashkilot_id', $tashkilot->id)->first();
        // Prepare data for the PDF
        $data = [
            'title' => 'Welcome to Funda of Web IT - fundaofwebit.com',
            'date' => date('m/d/Y'),
            'tashkilot' => $tashkilot,
            'qrCode' => $qrCode, // Pass QR Code image as base64
            'tekshirivchilar' => $tekshirivchilar
        ];



        // Generate the PDF
        $pdf = PDF::loadView('admin.pdf.doktarantura', $data);

        // Save the PDF to the specified path
        if (!file_exists(storage_path('app/public/pdfs'))) {
            mkdir(storage_path('app/public/pdfs'), 0755, true);
        }
        $pdf->save($filePath);

        // Store the PDF path in the database (example for one user)
        if ($tekshirivchilar) {
            $tekshirivchilar->file = $fileRelativePath;
            $tekshirivchilar->save();
        }

       return back()->with('status', 'PDF muvaffaqiyatli yaratildi va saqlandi.');
    }


}
