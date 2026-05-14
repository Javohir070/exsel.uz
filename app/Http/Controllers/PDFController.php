<?php

namespace App\Http\Controllers;

use App\Models\Akadem;
use App\Models\AkademExpert;
use App\Models\Asbobuskuna;
use App\Models\Asbobuskunaexpert;
use App\Models\Doktaranturaexpert;
use App\Models\IlmiyLoyiha;
use App\Models\Loyihaijrochilar;
use App\Models\Loyihaiqtisodi;
use App\Models\Monitoring;
use App\Models\Stajirovka;
use App\Models\Stajirovkaexpert;
use App\Models\Startup;
use App\Models\StartupExpert;
use App\Models\Tashkilot;
use App\Models\Intellektual;
use App\Models\Tekshirivchilar;
use App\Models\Tijorat;
use App\Models\TijoratExpert;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
class PDFController extends Controller
{
    public $monitoring;

    public function __construct()
    {
        $this->monitoring = Monitoring::getActive();
    }


    public function generatePDF($ilmiyId)
    {
        if (! $this->monitoring) {
            return back()->withErrors(['monitoring' => 'Faol monitoring topilmadi. PDF yaratilmadi.']);
        }

        $ilmiyloyiha = IlmiyLoyiha::with('asbobuskunalar')->findOrFail($ilmiyId);
        $fileName = 'Ilmiy-loyiha' . time() . '.pdf';
        $fileRelativePath = 'pdfs/' . $fileName;
        $filePath = storage_path('app/public/' . $fileRelativePath);

        $quarterId = $this->monitoring->id;

        $intellektual = Intellektual::where('ilmiy_loyiha_id', $ilmiyId)->where('quarter', $quarterId)->first();
        $loyihaiqtisodi = Loyihaiqtisodi::where('ilmiy_loyiha_id', $ilmiyId)->where('quarter', $quarterId)->first();
        $tekshirivchilar = Tekshirivchilar::where('quarter', $quarterId)->where('ilmiy_loyiha_id', $ilmiyId)->first();
        $loyihaijrochilar = Loyihaijrochilar::where('ilmiy_loyiha_id', $ilmiyId)->orderBy('id')->get();

        $pdfUrl = asset('storage/' . $fileRelativePath);

        $qrCode = base64_encode(QrCode::format('svg')->size(150)->generate($pdfUrl));

        $data = [
            'ilmiyloyiha' => $ilmiyloyiha,
            'loyihaAsbobuskunalar' => $ilmiyloyiha->asbobuskunalar,
            'intellektual' => $intellektual,
            'loyihaiqtisodi' => $loyihaiqtisodi,
            'tekshirivchilar' => $tekshirivchilar,
            'loyihaijrochilar' => $loyihaijrochilar,
            'qrCode' => $qrCode,
        ];

        $pdf = PDF::loadView('admin.pdf.usersPdf', $data);

        if (!file_exists(storage_path('app/public/pdfs'))) {
            mkdir(storage_path('app/public/pdfs'), 0755, true);
        }

        $pdf->save($filePath);

        if ($tekshirivchilar) {
            $tekshirivchilar->file = $fileRelativePath;
            $tekshirivchilar->holati ='Tasdiqlandi';
            $tekshirivchilar->save();
        }

        // Faylni yuklamasdan, faqat xabar yuboramiz
        return back()->with('status', 'PDF muvaffaqiyatli yaratildi va saqlandi.');
    }


    public function generatePDFsajiyor($Id)
    {
        $stajirovka = Stajirovka::findOrFail($Id);
        // Define a file name and path for the PDF
        $fileName = 'Stajirovka-' . time() . '.pdf';
        $fileRelativePath = 'pdfs/' . $fileName;
        $filePath = storage_path('app/public/' . $fileRelativePath);

        // Generate a URL for the PDF
        $pdfUrl = asset('storage/' . $fileRelativePath);

        // Generate the QR Code as a base64 image
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->generate($pdfUrl));
        $tekshirivchilar = Stajirovkaexpert::where('stajirovka_id', $stajirovka->id)->where('quarter', $this->monitoring->id)->first();
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
            $tekshirivchilar->holati ='Tasdiqlandi';
            $tekshirivchilar->save();
        }

       return back()->with('status', 'PDF muvaffaqiyatli yaratildi va saqlandi.');
    }

    public function generatePDFakadem($Id)
    {
        $akadem = Akadem::findOrFail($Id);
        // Define a file name and path for the PDF
        $fileName = 'Akadem-' . time() . '.pdf';
        $fileRelativePath = 'pdfs/' . $fileName;
        $filePath = storage_path('app/public/' . $fileRelativePath);

        // Generate a URL for the PDF
        $pdfUrl = asset('storage/' . $fileRelativePath);

        // Generate the QR Code as a base64 image
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->generate($pdfUrl));
        $tekshirivchilar = AkademExpert::where('akadem_id', $akadem->id)->where('quarter', $this->monitoring->id)->first();
        // Prepare data for the PDF
        $data = [
            'title' => 'Welcome to Funda of Web IT - fundaofwebit.com',
            'date' => date('m/d/Y'),
            'akadem' => $akadem,
            'qrCode' => $qrCode, // Pass QR Code image as base64
            'tekshirivchilar' => $tekshirivchilar
        ];



        // Generate the PDF
        $pdf = PDF::loadView('admin.pdf.akadem', $data);

        // Save the PDF to the specified path
        if (!file_exists(storage_path('app/public/pdfs'))) {
            mkdir(storage_path('app/public/pdfs'), 0755, true);
        }
        $pdf->save($filePath);

        // Store the PDF path in the database (example for one user)
        if ($tekshirivchilar) {
            $tekshirivchilar->file = $fileRelativePath;
            $tekshirivchilar->holati ='Tasdiqlandi';
            $tekshirivchilar->save();
        }

       return back()->with('status', 'PDF muvaffaqiyatli yaratildi va saqlandi.');
    }

    public function generatePDFstartup($Id)
    {
        $startup = Startup::findOrFail($Id);
        // Define a file name and path for the PDF
        $fileName = 'Startup-' . time() . '.pdf';
        $fileRelativePath = 'pdfs/' . $fileName;
        $filePath = storage_path('app/public/' . $fileRelativePath);

        // Generate a URL for the PDF
        $pdfUrl = asset('storage/' . $fileRelativePath);

        // Generate the QR Code as a base64 image
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->generate($pdfUrl));
        $tekshirivchilar = StartupExpert::where('startup_id', $startup->id)->where('quarter', $this->monitoring->id)->first();
        // Prepare data for the PDF
        $data = [
            'title' => 'Welcome to Funda of Web IT - fundaofwebit.com',
            'date' => date('m/d/Y'),
            'startup' => $startup,
            'qrCode' => $qrCode, // Pass QR Code image as base64
            'tekshirivchilar' => $tekshirivchilar
        ];



        // Generate the PDF
        $pdf = PDF::loadView('admin.pdf.startup', $data);

        // Save the PDF to the specified path
        if (!file_exists(storage_path('app/public/pdfs'))) {
            mkdir(storage_path('app/public/pdfs'), 0755, true);
        }
        $pdf->save($filePath);

        // Store the PDF path in the database (example for one user)
        if ($tekshirivchilar) {
            $tekshirivchilar->file = $fileRelativePath;
            $tekshirivchilar->holati ='Tasdiqlandi';
            $tekshirivchilar->save();
        }

       return back()->with('status', 'PDF muvaffaqiyatli yaratildi va saqlandi.');
    }

    public function generatePDFtijorat($Id)
    {
        if (! $this->monitoring) {
            return back()->withErrors(['monitoring' => 'Faol monitoring topilmadi. PDF yaratilmadi.']);
        }

        $tijorat = Tijorat::findOrFail($Id);
        // Define a file name and path for the PDF
        $fileName = 'Tijorat-' . time() . '.pdf';
        $fileRelativePath = 'pdfs/' . $fileName;
        $filePath = storage_path('app/public/' . $fileRelativePath);

        // Generate a URL for the PDF
        $pdfUrl = asset('storage/' . $fileRelativePath);

        $tekshirivchilar = TijoratExpert::where('tijorat_id', $tijorat->id)->where('quarter', $this->monitoring->id)->first();

        if (! $tekshirivchilar) {
            return back()->withErrors(['pdf' => 'Ushbu chorak uchun tijorat ekspert xulosasi topilmadi. PDF yaratilmadi.']);
        }

        // Generate the QR Code as a base64 image (SVG — blade da data:image/svg+xml)
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->generate($pdfUrl));
        // Prepare data for the PDF
        $data = [
            'title' => 'Welcome to Funda of Web IT - fundaofwebit.com',
            'date' => date('m/d/Y'),
            'tijorat' => $tijorat,
            'qrCode' => $qrCode, // Pass QR Code image as base64
            'tekshirivchilar' => $tekshirivchilar
        ];



        // Generate the PDF
        $pdf = PDF::loadView('admin.pdf.tijorat', $data);

        // Save the PDF to the specified path
        if (!file_exists(storage_path('app/public/pdfs'))) {
            mkdir(storage_path('app/public/pdfs'), 0755, true);
        }
        $pdf->save($filePath);

        // Store the PDF path in the database (example for one user)
        if ($tekshirivchilar) {
            $tekshirivchilar->file = $fileRelativePath;
            $tekshirivchilar->holati ='Tasdiqlandi';
            $tekshirivchilar->save();
        }

       return back()->with('status', 'PDF muvaffaqiyatli yaratildi va saqlandi.');
    }

    public function generatePDFAsbobuskuna($Id)
    {
        $asbobuskuna = Asbobuskuna::findOrFail($Id);
        // Define a file name and path for the PDF
        $fileName = 'Asbobuskuna-' . time() . '.pdf';
        $fileRelativePath = 'pdfs/' . $fileName;
        $filePath = storage_path('app/public/' . $fileRelativePath);

        // Generate a URL for the PDF
        $pdfUrl = asset('storage/' . $fileRelativePath);

        // Generate the QR Code as a base64 image
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->generate($pdfUrl));
        $tekshirivchilar = Asbobuskunaexpert::where('asbobuskuna_id', $asbobuskuna->id)->where('quarter', $this->monitoring->id)->first();
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
            $tekshirivchilar->holati ='Tasdiqlandi';
            $tekshirivchilar->save();
        }

       return back()->with('status', 'PDF muvaffaqiyatli yaratildi va saqlandi.');
    }


    public function generatePDFDoktarantura($Id)
    {
        $tashkilot = Tashkilot::findOrFail($Id);
        // Define a file name and path for the PDF
        $fileName = 'Ilmiy-izlauvchilar-' . time() . '.pdf';
        $fileRelativePath = 'pdfs/' . $fileName;
        $filePath = storage_path('app/public/' . $fileRelativePath);

        // Generate a URL for the PDF
        $pdfUrl = asset('storage/' . $fileRelativePath);

        // Generate the QR Code as a base64 image
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->generate($pdfUrl));
        $tekshirivchilar = Doktaranturaexpert::where('tashkilot_id', $tashkilot->id)->where('quarter', $this->monitoring->id)->first();
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
            $tekshirivchilar->holati ='Tasdiqlandi';
            $tekshirivchilar->save();
        }

       return back()->with('status', 'PDF muvaffaqiyatli yaratildi va saqlandi.');
    }


}
