
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payment Invoice</title>

    <style>
        @page {
            margin: 15px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .container {
            border: 1px solid #000;
            padding: 15px;
        }

        .header {
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .header-left {
            float: left;
            width: 60%;
        }

        .header-right {
            float: right;
            width: 40%;
            text-align: right;
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
        }

        .clear {
            clear: both;
        }

        .section-title {
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
            border-bottom: 1px solid #000;
            padding-bottom: 3px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            font-weight: bold;
        }

        .info-table td:first-child {
            width: 30%;
            font-weight: bold;
        }

        .summary {
            width: 40%;
            margin-left: auto;
            margin-top: 10px;
        }

        .summary td {
            padding: 6px;
        }

        .total {
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 10px;
            border-top: 1px solid #000;
            padding-top: 5px;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">

    <div class="header-left">
        <img src="{{  public_path('logo/filliplogo.png')}}"
             alt="Logo"
             style="height:60px; margin-bottom:10px;">

        <h2>PAYMENT INVOICE</h2>
    </div>

    <div class="header-right">
        <strong>Invoice #</strong> INV-{{ $viewdata->id }}<br>
        <strong>Date:</strong>
        {{ \Carbon\Carbon::parse($viewdata->created_at)->format('d M Y') }}
    </div>

    <div class="clear"></div>

</div>

    <table width="100%">
        <tr>
            <td width="50%" valign="top">

                <div class="section-title">
                    Customer Information
                </div>

                <table class="info-table">
                    <tr>
                        <td>Name</td>
                        <td>{{ $viewdata->user->first_name.''.$viewdata->user->last_name ?? '-' }}</td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td>{{ $viewdata->user->email ?? '-' }}</td>
                    </tr>

                    <tr>
                        <td>Mobile</td>
                        <td>{{ $viewdata->user->phone ?? '-' }}</td>
                    </tr>
                </table>

            </td>

            <td width="50%" valign="top">

                <div class="section-title">
                    Payment Information
                </div>

                <table class="info-table">
                    <tr>
                        <td>Transaction ID</td>
                        <td>{{ $viewdata->razorpay_order_id ?? '-' }}</td>
                    </tr>

                    <tr>
                        <td>Method</td>
                        <td>Online</td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td>
                            {{ strtoupper($viewdata->status ?? '-') }}
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>

    <div class="section-title">
        Plan Details
    </div>

    <table>
        <thead>
        <tr>
            <th>Plan Name</th>
             <th>Plan Type</th>
            <th>Duration</th>
            <th>Amount</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>{{ $viewdata->plan->name ?? '-' }}</td>
            <td>{{ $viewdata->plan->plans ?? '-' }}</td>
            <td>{{ $viewdata->plan->validity_day ?? '-' }} Days</td>
            <td>₹ {{ number_format($viewdata->amount, 2) }}</td>
        </tr>
        </tbody>
    </table>

    <table class="summary">
        <tr>
            <td>Subtotal</td>
            <td>₹ {{ number_format($viewdata->amount, 2) }}</td>
        </tr>

        <tr>
            <td>Tax</td>
            <td>₹ 0.00</td>
        </tr>

        <tr class="total">
            <td>Total</td>
            <td>₹ {{ number_format($viewdata->amount, 2) }}</td>
        </tr>
    </table>

    <div class="clear"></div>

    <div class="footer">
        <p>Thank you for your payment.</p>
        <p>
            Generated On:
            {{ now()->format('d M Y h:i A') }}
        </p>
    </div>

</div>

</body>
</html>

