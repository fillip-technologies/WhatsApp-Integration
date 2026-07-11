<?php

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;


if(!function_exists('InvoiceGenerate')){
   function InvoiceGenerate($data){
    $pdf = Pdf::loadView('pdf.invoice',compact('data'));
    return $pdf->download('invoice.pdf');
}
if(!function_exists('getUser')){
    function getUser(){
          $usersdata = User::where('role','user')->select('id','first_name','last_name')->get();
          return $usersdata;
    }
}

}

if(!function_exists(' BusinessType')){
    function  BusinessType(){
        return
        [
            "E-commerce",
            "Education",
            "Healthcare",
            "Real Estate",
            "Marketing Agency",
            "Other"
        ];
    }
}
