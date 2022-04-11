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
                <h1 dir="rtl"><i class="fas fa-user-friends"></i> زانیاری کارمەند</h1>
            </div>
            <div class="customer-container" dir="rtl">
                <div class="left">
                    <div class="view-cust" dir="rtl">
                        <h1>زانیاری کارمەند</h1>
                        <div>
                            <h3> ناوی کارمەند:
                            {{ $employee->employeeName }}</h3>
                        </div>
                        <div>
                            <h3>ژمارەی مۆبایل: 
                            {{ $employee->mobileEmployee }}</h3>
                        </div>
                        <div>
                            <h3>لێهاتوویی: {{ $employee->Designation }}</h3>
                        </div>
                        <div class="flexfrance">
                            <h3 class="font_NRT-Reg">ژمارەی ئیشەکان: {{ $numberofjobcardforeachemployee }}&nbsp;&nbsp;&nbsp;</h3>
                            <a href="{{ route('showallemployee', ['employee' => $employee->id]) }}" class="btn">
                                پیشاندان</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
