@extends('layout.layout')
@section('content')
    {{-- Mohammad --}}
    <style>
        input[type="text"] {
            text-indent: 18px;
            outline: none;
            transition: all 700ms;
        }

        input[type="text"]:focus {
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
                <h1 dir="rtl"><i class="fas fa-briefcase"></i> چاککردنی ئیش</h1>
            </div>
            <div class="adding">
                {{-- The Form --}}
                <form action="{{ route('jobcard.update', ['jobcard' => $jobcard->id]) }}" method="POST"
                    class="franceborder" dir="rtl">
                    @csrf
                    @method('PUT')
                    <div class="input-form">
                        <label for="cust-name-1">ناوی موشتەری: </label>
                        <input type="text" id="cust-name-1" name="customerName"
                            value="{{ old('customerName', optional($jobcard ?? null)->customerName) }}">
                    </div>
                    @error('customerName')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1"> مۆدێلی سەیارە:</label>
                        <input type="text" id="phone-num-1" name="vehicleBrand"
                            value="{{ old('vehicleBrand', optional($jobcard ?? null)->vehicleBrand) }}">
                    </div>
                    @error('vehicleBrand')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1">بەرواری دەستپێک:</label>
                        <input type="Date" id="phone-num-1" name="inDate" class="datepicker" id="birth_date"
                            value="{{ old('inDate', optional($jobcard ?? null)->inDate) }}">
                    </div>
                    @error('inDate')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1">بەرواری تەواوبوون:</label>
                        <input type="Date" id="birth_date" id="phone-num-1" name="outDate" class="datepicker"
                            value="{{ old('outDate', optional($jobcard ?? null)->outDate) }}">
                    </div>
                    @error('outDate')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1"> کارمەندی چاککردنەوە:</label>
                        <input type="text" id="phone-num-1" name="asignedTo"
                            value="{{ old('asignedTo', optional($jobcard ?? null)->asignedTo) }}">
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
