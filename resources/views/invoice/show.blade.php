@extends('layout.layout')
@section('content')
    <style>
        * {
            font-family: 'NRT-Reg';
            letter-spacing: 0.2rem;
        }

    </style>
    <section class="main">
        <div class="customer-section">
            <div class="heading">
                <h1 dir="rtl"><i class="fas fa-file-invoice"></i>&nbsp;وەسڵ</h1>
            </div>
            <div class="customer-container" dir="rtl">
                <div class="left" >
                    <div class="view-cust">
                        <h1>بینینی وەسڵ</h1>
                        <h3>ناوی موشتەری:<span>{{ $invoice->customerName }}</span></h3>
                        <h3>پارەی تەواو:<span>{{ $invoice->totalAmount }}</span></h3>
                        <h3>پارەی دراو:<span>{{ $invoice->totalPaid }}</span></h3>
                        <h3>پارەی ماوە:<span>{{ $invoice->totalAmount - $invoice->totalPaid }}</span></h3>
                    </div>
                    <div class="list-of-invoices">
                        <h1>بەشە چاککراوەکان</h1>
                        <textarea name="" id="textarea" cols="36" rows="10" readonly>{{ $invoice->repairBrokenpart }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
