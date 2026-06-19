<?php

use Barryvdh\DomPDF\Facade\Pdf;

if(!function_exists('InvoiceGenerate')){
   function InvoiceGenerate($data){
    $pdf = Pdf::loadView('pdf.invoice',compact('data'));
    return $pdf->download('invoice.pdf');
}

}
