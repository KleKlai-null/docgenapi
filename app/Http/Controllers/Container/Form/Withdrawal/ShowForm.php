<?php

namespace App\Http\Controllers\Container\Form\Withdrawal;

use App\Http\Controllers\Controller;
use App\Models\Form\WithdrawalSlip\Wsdm;
use App\Models\Form\WithdrawalSlip\Wsfa;
use App\Models\Form\WithdrawalSlip\Wsfg;
use App\Models\Form\WithdrawalSlip\Wsma;
use Illuminate\Http\Request;
use App\Models\Form\WithdrawalSlip\Wsmi;
use App\Models\Form\WithdrawalSlip\Wsmro;
use App\Services\DocumentService;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class ShowForm extends Controller
{
    public function show(Request $request)
    {   
        $splice = Str::of($request->key)->explode('-');
        $unique = Str::lower($splice[1]);

        switch ($unique) {
            case 'mi': 
                $data = Wsmi::with('items')->where('document_series_no', $request->key)->first();

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
}
