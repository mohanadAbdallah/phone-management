<html lang="ar" dir="rtl">
<head>
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

    <style>
        @media print {
            div {
                break-inside: avoid;
            }
        }
        body {
            font-family: 'Cairo', Georgia, 'Times New Roman', Times, serif !important;
        }
    </style>

</head>

<body style="background-color: #efefef;margin-right: auto;margin-left: auto">

    <div style="width: 100%;background-color: white;margin-top: 20px;padding-top: 20px;padding-bottom: 20px">
        <table style="width: 100%;">
            <tbody>
            <tr>
                <td style="width: 50%">
                        {{Cache::get('app_name','Mohannad Phone')}}
                   </td>
                <td style="width: 50%"> تاريخ
                    الاضافة: {{$customerPayments->mobile->created_at->format('d-m-Y')}} {{$customerPayments->mobile->created_at->format('H:i')}}</td>

            </tr>
            <tr>
                <td style="width: 50%">

                </td>

            </tr>

            <tr>
                <td style="width: 50%"></td>
                <td style="width: 50%"></td>
            </tr>
            <tr>
                <td style="width: 50%"></td>
                <td style="width: 50%"></td>
            </tr>
            <tr>
                <td style="width: 50%"></td>
                <td style="width: 50%"></td>
            </tr>
            </tbody>
        </table>

        <table style="width: 100%;border-collapse:collapse; margin-top: 10px ">
            <tbody>
            <tr>
                <td style="width: 40%;font-weight: bold;border: 1px solid black">معلومات الزبون</td>
                <td style="width: 35%;font-weight: bold;border: 1px solid black">العنوان</td>
                <td style="width: 25%;font-weight: bold;border: 1px solid black">الجوال</td>
            </tr>
            <tr>
                <td style="width: 50%;; border-left: 1px solid black; border-right: 1px solid black;">
                     الاسم: {{$customerPayments->customer_name ?? '--'}}</td>
                <td style="width: 25%; border-left: 1px solid black; border-right: 1px solid black;">
                     العنوان: {{$customerPayments->address ?? '--'}}</td>
                <td style="width: 25%; border-left: 1px solid black; border-right: 1px solid black;">
                     {{$customerPayments->mobile->mobile_name ?? '--'}}</td>
            </tr>
            <tr>
                <td style="width: 50%; border-left: 1px solid black; border-right: 1px solid black;">الهاتف:
                    {{$customerPayments->phone ?? '--'}}</td>
                <td style="width: 25%; border-left: 1px solid black; border-right: 1px solid black;">
                     الهوية :{{$customerPayments->identity ?? '--'}}
                </td>
                <td style="width: 25%; border-left: 1px solid black; border-right: 1px solid black;">
                  السعر الإجمالي :   {{$customerPayments->mobile->salary ?? '--'}}
                </td>
            </tr>
            <tr>
                <td style="width: 50%; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;font-weight: bold;"></td>
                <td style="width: 25%; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;"></td>
                <td style="width: 25%; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;"></td>
            </tr>
            </tbody>
        </table>

        <table style="width: 70%;border-collapse:collapse; margin-top: 10px ;border: none;margin-left:auto;margin-right:auto;text-align: center">
            <tbody>
            <tr>
                <td style="font-weight: bold;border: 1px solid black;margin:30px;">#</td>
                <td style="font-weight: bold;border: 1px solid black">@lang('app.payment')</td>
                <td style="font-weight: bold;border: 1px solid black">@lang('app.date')</td>
                <td style="font-weight: bold;border: 1px solid black">@lang('app.description')</td>

            </tr>
            @foreach($customerPayments->mobile->mobile_payments ?? [] as $payment)
                <tr>
                    <td style="border: 1px solid black">{{++ $loop->index}}</td>
                    <td style="border: 1px solid black">{{$payment->payment ?? ' 0.0 '}} شيكل </td>
                    <td style="border: 1px solid black">{{ $payment->created_at->format('d-m-Y')  ?? '' }}</td>
                    <td style="border: 1px solid black">{{$payment->description ?? '--'}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <table style="width: 70%;border-collapse:collapse; margin-top: 10px ;border: none;margin-left:auto;margin-right:auto;">
            <tbody>
            <tr>
               </td>
                <td style="border: 1px solid black; width: 50%">المتبقي : </td>
                <td style="border: 1px solid black; width: 50%; text-align: center">{{$customerPayments->mobile->residual ?? '0.0'}} شيكل </td>
            </tr>

            </tbody>
        </table>

    </div>
</body>

<script>
    window.print();
</script>
</html>

