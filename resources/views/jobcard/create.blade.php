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
        <div class="customer-section">
            <div class="heading">
                <h1 dir="rtl"><i class="fas fa-briefcase"></i> زیادکردنی ئیش</h1>
            </div>
            <div class="adding">
                {{-- The Form --}}
                <form action="{{ route('jobcard.store') }}" method="POST" class="franceborder">
                    @csrf
                    <div class="input-form">
                        <label for="cust-name-1">ناوی موشتەری: </label>
                        <input type="text" id="cust-name-1" name="customerName">
                    </div>
                    @error('customerName')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1"> مۆدێلی سەیارە:</label>
                        <input type="text" id="phone-num-1" name="vehicleBrand">
                    </div>
                    @error('vehicleBrand')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1">بەرواری دەستپێک:</label>
                        <input type="Date" id="phone-num-1" name="inDate" id="birth_date" class="datepicker">
                    </div>
                    @error('inDate')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1">بەرواری تەواوبوون:</label>
                        <input type="Date" id="birth_date" id="phone-num-1" name="outDate" class="datepicker">
                    </div>
                    @error('outDate')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1">کارمەندی چاککردنەوە:</label>
                        <input type="text" id="phone-num-1" name="asignedTo">
                    </div>
                    @error('asignedTo')
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
