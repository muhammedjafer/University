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

    </style>

    <section class="main">
        <div class="customer-section">
            <div class="heading">
                <h1 dir="rtl"><i class="far fa-bell"></i> زیادکردنی پەیوەندی</h1>
            </div>
            <div class="adding">
                {{-- The Form --}}
                <form action="{{ route('notification.store') }}" method="POST" class="franceborder" dir="rtl">
                    @csrf
                    <div class="input-form">
                        <label for="cust-name-1">ناوی موشتەری: </label>
                        <input type="text" id="cust-name-1" name="name">
                    </div>
                    @error('name')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1"> ژمارەی مۆبایل:</label>
                        <input type="text" id="phone-num-1" name="mobileNumber">
                    </div>
                    @error('mobileNumber')
                        <div id="error">{{ $message }}</div>
                    @enderror
                    <div class="input-form">
                        <label for="phone-num-1">شوێن:</label>
                        <input type="text" id="phone-num-1" name="location" id="birth_date">
                    </div>
                    @error('location')
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
