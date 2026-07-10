<?php

namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PaymentDataExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Payment::with(['user', 'plan'])->get();
    }

    public function map($payment): array
    {
        return [
            $payment->id,
            $payment->user?->first_name . $payment->user?->last_name,
            $payment->user?->email,
            $payment->user?->phone,
            $payment->plan?->name,
            $payment->plan?->validity_day,
            $payment->amount,
            $payment->status,
            $payment->razorpay_payment_id,
            optional($payment->paid_at)->format('d-m-Y H:i:s'),
        ];
    }

    public function headings(): array
    {
        return [
            'Payment ID',
            'User Name',
            'User Email',
            'User Phone',
            'Plan Name',
            'Plan Validity',
            'Amount',
            'Status',
            'Transaction ID',
            'Payment Date',
        ];
    }
}