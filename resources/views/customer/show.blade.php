@extends('layout.layout')
@section('content')
    <style>
        .flexfrance {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .flexfrance a {
            margin-top: 8px;
            margin-bottom: 8px;
            margin-left: 12px;
            font-family: 'NRT-Reg';
            letter-spacing: 0.2rem; 
        }

        * {
            font-family: 'NRT-Reg';
            letter-spacing: 0.2rem;
        }

    </style>
    <section class="main">
        <div class="customer-section">
            <div class="heading">
                <h1 dir="rtl"><i class="fas fa-user-friends"></i> زانیاری موشتەری</h1>
            </div>
            <div class="customer-container" dir="rtl">
                <div class="left">
                    <div class="view-cust" dir="rtl">
                        <h1>زانیاری موشتەری</h1>
                        <div>
                            <h3> ناوی موشتەری:
                            {{ $customer->customerName }}</h3>
                        </div>
                        <div>
                            <h3>ژمارەی مۆبایل: 
                            {{ $customer->mobileNumber }}</h3>
                        </div>
                        <div>
                            <h3>  پارەی دراو: {{ $paidAmount }}</h3>
                        </div>
                        <div>
                            <h3>  پارەی ماوە: {{ $paidPaid - $paidAmount }}</h3>
                        </div>
                        <div class="flexfrance">
                            <h3>  ژمارەی وەسڵەکان:
                            {{ $invoice }}</h3>
                            <a href="{{ route('showallinvoice', ['customer' => $customer->id]) }}" class="btn">
                                پیشاندان</a>
                        </div>
                        <div class="flexfrance">
                            <h3>  ژمارەی پەیوەندیەکان:
                            {{ $notification }}</h3>&nbsp; &nbsp;&nbsp;&nbsp;
                            <a href="{{ route('showallnotification', ['customer' => $customer->id]) }}"
                                class="btn"> پیشاندان</a>
                        </div>
                        <div class="flexfrance">
                            <h3 class="font_NRT-Reg">  ژمارەی ئیشەکان: {{ $jobCard }}</h3>
                            <a href="{{ route('showall', ['customer' => $customer->id]) }}" class="btn">
                                پیشاندان</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
