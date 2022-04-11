@extends('layout.layout')
@section('content')
    {{-- Mohammad --}}
    <style>
        input {
            text-indent: 18px;
            outline: none;
            transition: all 700ms;
        }

        input:focus {
            background-color: rgb(222, 227, 233);
        }

        .franceborder {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: flex-end;
            align-content: space-between;
            text-indent: 18px;

        }

        * {
            font-family: 'NRT-Reg';
            letter-spacing: 0.2rem;
        }

    </style>
    <section class="main">
        <div class="customer-section">
            <div class="heading">
                <h1 dir="rtl"><i class="fas fa-file-invoice"></i>  چاککردنی وەسڵ</h1>
            </div>
            <div class="adding">
                {{-- The Form --}}
                <form action="{{ route('invoice.update', ['invoice' => $invoice->id]) }}" method="POST"
                    class="franceborder" dir="rtl">
                    @csrf
                    @method('PUT')
                    <div class="input-form">
                        <label for="cust-name-1">ناوی موشتەری: </label>
                        <input type="text" id="cust-name-1" name="customerName"
                            value="{{ old('customerName', optional($invoice ?? null)->customerName) }}">
                    </div>
                    @error('customerName')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1"> پارەی تەواو:</label>
                        <input type="text" id="phone-num-1" name="totalAmount"
                            value="{{ old('totalAmount', optional($invoice ?? null)->totalAmount) }}">
                    </div>
                    @error('totalAmount')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1">پارەی دراو:</label>
                        <input type="text" id="phone-num-1" name="totalPaid"
                            value="{{ old('totalPaid', optional($invoice ?? null)->totalPaid) }}">
                    </div>
                    @error('totalPaid')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1">بەروار:</label>
                        <input type="Date" id="birth_date" id="phone-num-1" name="Date" class="datepicker"
                            value="{{ old('Date', optional($invoice ?? null)->Date) }}">
                    </div>
                    @error('Date')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1">بەشە چاککراوەکان:</label>
                        <textarea id="textarea" id="phone-num-1" name="repairBrokenPart" cols="35"
                            rows="10">{{ old('repairBrokenPart', optional($invoice ?? null)->repairBrokenpart) }}</textarea>
                    </div>
                    @error('repairBrokenPart')
                        <div id="error">{{ $message }}</div>
                    @enderror

                    <div class="buttons">
                        <button class="form-btn submit-btn">ناردن</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
