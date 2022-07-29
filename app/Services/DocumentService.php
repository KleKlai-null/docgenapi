<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Form\ReturnSlip\ReturnSlip;
use App\Models\Form\WithdrawalSlip\Wsdm;
use App\Models\Form\WithdrawalSlip\Wsfa;
use App\Models\Form\WithdrawalSlip\Wsfg;
use App\Models\Form\WithdrawalSlip\Wsma;
use App\Models\Form\WithdrawalSlip\Wsmi;
use App\Models\Form\WithdrawalSlip\Wsmro;
use App\Models\Form\Memorandum;
use App\Models\Form\ServiceCall;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class DocumentService
{

    public static function GenerateSeriesNo($company, $documentCode)
    {
        $count =  DocumentService::getCount($documentCode);
        $series = sprintf("%05d", $count + 1);

        $first_series_no = strtoupper($company . '-' . $documentCode);
        $second_series_no = $first_series_no . '-' . now()->format('Y') . '-' . $series;

        return $second_series_no;
    }

    public static function getCount($documentCode)
    {
        $unique = Str::lower($documentCode);

        switch ($unique) {
            case "mi":

                $data = Wsmi::count();

                return $data;
                break;
            case "mro":
                $data = Wsmro::count();

                return $data;
                break;
            case "dm":
                $data = Wsdm::count();

                return $data;
                break;
            case "fg":
                $data = Wsfg::count();

                return $data;
                break;
            case "fa":
                $data = Wsfa::count();

                return $data;
                break;
            case "ma":
                $data = Wsma::count();

                return $data;
                break;
            case "sc":
                $data = ServiceCall::count();

                return $data;
                break;
            case "mr":
                $data = Memorandum::count();

                return $data;
                break;
            case "rs":
                $data = ReturnSlip::count();

                return $data;
                break;
            default:
                return 'test';
        }
    }

    public static function getDocument($data)
    {
        $splice = Str::of($data)->explode('-');
        $unique = Str::lower($splice[1]);

        $data = substr($data, 4);

        switch ($unique) {
            case "mi":
                $data = Wsmi::with('items')->DocumentSeries($data)->first();

                return $data;
                break;
            case "mro":
                $data = Wsmro::with('items')->DocumentSeries($data)->first();

                return $data;
                break;
            case "dm":
                $data = Wsdm::with('items')->DocumentSeries($data)->first();

                return $data;
                break;
            case "fg":
                $data = Wsfg::with('items')->DocumentSeries($data)->first();

                return $data;
                break;
            case "fa":
                $data = Wsfa::with('items')->DocumentSeries($data)->first();

                return $data;
                break;
            case "ma":
                $data = Wsma::with('items')->DocumentSeries($data)->first();

                return $data;
                break;
            case "sc":
                $data = ServiceCall::with('items')->DocumentSeries($data)->first();

                return $data;
                break;
            case "mr":
                $data = Memorandum::with('items')->DocumentSeries($data)->first();

                return $data;
                break;
            case "rs":
                $data = ReturnSlip::with('items')->DocumentSeries($data)->first();

                return $data;
                break;
            default:
                return 'No Result Found';
        }
    }

    public static function generatePDF($data, $type)
    {
        try {
            $qrcode = base64_encode(QrCode::format('svg')->size(110)->errorCorrection('H')->generate(config('app.url').'/verify/key='.$data->document_series_no));

            $pdf = Pdf::loadView('forms.pdf.'.$type, compact('qrcode', 'data'))->setPaper('portrait');
            $content = $pdf->download()->getOriginalContent();
            Storage::disk('local')->put('bak/pdf/'.$data->document_series_no.'-'.now()->format('His').'.pdf',$content) ;
        
            return true;

        } catch (Exception $exception) {
            return false;
        }
    }
}
