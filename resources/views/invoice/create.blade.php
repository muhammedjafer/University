@extends('layout.layout')
@section('content')
    {{-- Muhammad --}}
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

        }

        * {
            font-family: 'NRT-Reg';
            letter-spacing: 0.2rem;
        }

    </style>

    <section class="main">
        <div class="customer">
            <div class=" heading">
                <h1 dir="rtl"><i class="fas fa-file-invoice"></i> زیادکردنی وەسڵ</h1>
            </div>
            <div class="adding" dir="rtl" style="margin-bottom: 134px;">
                {{-- The Form --}}
                <form action="{{ route('invoice.store') }}" method="POST" class="franceborder">
                    @csrf
                    <div class="input-form">
                        <label for="cust-name-1">ناوی موشتەری: </label>
                        <input type="text" id="cust-name-1" name="customerName">
                    </div>
                    @error('customerName')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1"> پارەی تەواو:</label>
                        <input type="text" id="phone-num-1" name="totalAmount">
                    </div>
                    @error('totalAmount')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1">پارەی دراو:</label>
                        <input type="text" id="phone-num-1" name="totalPaid">
                    </div>
                    @error('totalPaid')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1">بەروار:</label>
                        <input type="Date" id="birth_date" id="phone-num-1" name="Date" class="datepicker">
                    </div>
                    @error('Date')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1">بەشە چاککراوەکان:</label>
                        <textarea id="textarea" id="phone-num-1" name="repairBrokenPart" cols="35" rows="10"></textarea>
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
