<?php

namespace App\Http\Controllers\Container\Form\Withdrawal;

use App\Http\Controllers\Controller;
use App\Jobs\PdfGeneratorProcess;
use App\Models\Form\Memorandum;
use App\Models\Form\ServiceCall;
use App\Models\Form\WithdrawalSlip\Wsdm;
use App\Models\Form\WithdrawalSlip\Wsfa;
use App\Models\Form\WithdrawalSlip\Wsfg;
use App\Models\Form\WithdrawalSlip\Wsma;
use Illuminate\Http\Request;
use App\Models\Form\WithdrawalSlip\Wsmi;
use App\Models\Form\WithdrawalSlip\Wsmro;
use App\Services\DocumentService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShowForm extends Controller
{
    public function show(Request $request)
    {   
        $splice = Str::of($request->key)->explode('-');
        $unique = Str::lower($splice[1]);

        switch ($unique) {
            case 'mi': 
                $data = Wsmi::with('items')->where('document_series_no', 'GFI-MI-2022-00001')->first();

                abort_if(!$data, 404);
                // Generate PDF File

                // $pdf = PDF::loadView('forms.pdf.mi', compact('data'));
                // $content = $pdf->stream();

                // DocumentService::generatePDF($data);

                return view('forms.pdf.mi', compact('data'));
                break;
            case 'mro':
                $data = Wsmro::with('items')->where('document_series_no', $request->key)->first();

                abort_if(!$data, 404);

                return view('forms.mro.show', compact('data'));
                break;
            case 'dm':
                $data = Wsdm::with('items')->where('document_series_no', $request->key)->first();

                abort_if(!$data, 404);

                return view('forms.dm.show', compact('data'));
                break;
            case 'fg':
                $data = Wsfg::with('items')->where('document_series_no', $request->key)->first();

                abort_if(!$data, 404);

                return view('forms.fg.show', compact('data'));
                break;
            case 'fa':
                $data = Wsfa::with('items')->where('document_series_no', $request->key)->first();

                abort_if(!$data, 404);

                return view('forms.fa.show', compact('data'));
                break;
            case 'ma':
                $data = Wsma::with('items')->where('document_series_no', $request->key)->first();

                abort_if(!$data, 404);

                return view('forms.ma.show', compact('data'));
                break;
            default: 
                abort(404);
        }
    }

    public function generatePDF()
    {
        $data = ServiceCall::first();

        $qrcode = base64_encode(QrCode::format('svg')->size(110)->errorCorrection('H')->generate($data->document_series_no));
        $pdf = Pdf::loadView('forms.pdf.sc', compact('qrcode', 'data'))->setPaper('portrait');
        // return $pdf->download('invoice.pdf');
        return $pdf->stream();
        // $content = $pdf->download()->getOriginalContent();
        // Storage::disk('local')->put('bak/pdf/'.$data->document_series_no.'.pdf',$content) ;

    }
}
