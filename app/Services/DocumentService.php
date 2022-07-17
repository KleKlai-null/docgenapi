<?php

namespace App\Services;

class DocumentService {

    public static function GenerateSeriesNo($company, $documentCode)
    {
        $series = $count = sprintf("%05d", 34 + 1);

        $first_series_no = strtoupper($company. '-'. $documentCode);
        $second_series_no = $first_series_no. '-' . now()->format('Y'). '-' . $series;

        return $second_series_no;
    }

}