<?php

namespace App\Traits;

trait HasFormatRupiah
{
    function formatRupiah($field, $prefix = null)
    {
        $prefix = $prefix ? $prefix : 'Rp. ';
        $nominal = $this->$field;
        return $prefix . number_format($nominal, 0, ',','.');
    }
}