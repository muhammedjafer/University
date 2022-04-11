@extends('layout.layout')
@section('content')
    <!-- Mohammad -->
    <style>
        #search1 {
            text-indent: 18px;
            outline: none;
        }

        #search1:focus {
            background-color: rgb(222, 227, 233);
        }

        div.paginate {
            font-size: 25px;
            margin-left: 365px;
            padding: 12px;
            float: left;
        }

        .delete-moi {
            all: unset;
        }

        #searchdel {
            background-color: #1a535c;
            font-size: 1.8rem;
            color: var(--text-color-sidebar);
            padding: 1rem 1.8rem;
            transition: all 0.3s;
        }

        input[type=search]::-ms-clear {
            display: none;
            width: 0;
            height: 0;
        }

        input[type=search]::-ms-reveal {
            display: none;
            width: 0;
            height: 0;
        }

        /* clears the ‘X’ from Chrome */
        input[type="search"]::-webkit-search-decoration,
        input[type="search"]::-webkit-search-cancel-button,
        input[type="search"]::-webkit-search-results-button,
        input[type="search"]::-webkit-search-results-decoration {
            display: none;
        }

        * {
            font-family: 'NRT-Reg';
            letter-spacing: 0.2rem;
        }

    </style>
    <section class="main">
        <div class="customer-section">
            <div class="heading">
                <h1 dir="rtl"><i class="fas fa-file-invoice"></i>  وەسڵەکان</h1>
            </div>
            <div class="upper-section">
                <div class="search">
                    <form action="searchinvoice" method="get">
                        <input type="search" id="search1" name="searchinvoice" value="{{request('searchinvoice')}}">
                        &nbsp;<button class="btn" type="submit" id="searchdel">
                            گەڕان
                        </button>
                    </form>
                </div>
                <a href="{{ route('invoice.create') }}" class="btn">زیادکردنی وەسڵ</a>
            </div>
            <table class="table-fill table-employee">
                <thead>
                    <tr class="font_NRT-Reg">
                        <th class="text-left">ناوی موشتەری</th>
                        <th class="text-left">بڕی پارەی تەواو</th>
                        <th class="text-left">بڕی پارەی دراو</th>
                        <th class="text-left">بڕی پارەی ماوە</th>
                        <th class="text-left">بەروار</th>
                        <th class="text-left">چاککردن</th>
                        <th class="text-left">زیاتر</th>
                        <th class="text-left">لابردن</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($post as $invoice)
                        <tr>
                            <td class="text-left">{{ $invoice->customerName }}</td>
                            <td class="text-left">{{ $invoice->totalAmount }}</td>
                            <td class="text-left">{{ $invoice->totalPaid }}</td>
                            <td class="text-left">{{ $invoice->totalAmount - $invoice->totalPaid }}</td>
                            <td class="text-left">{{ $invoice->Date }}</td>
                            <td class="text-left"><a
                                    href="{{ route('invoice.edit', ['invoice' => $invoice->id]) }}">چاککردن</a></td>
                            <td class="text-left"><a
                                    href="{{ route('invoice.show', ['invoice' => $invoice->id]) }}">زیاتر</a></td>
                            <td class="text-left">
                                {{-- we use this term route() to go back to the controller, we use "" to go back to view. --}}
                                <form action="{{ route('invoice.destroy', ['invoice' => $invoice->id]) }}" method="POST"
                                    class="table-moi">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete-moi" class="text-left"
                                        class="delete-moi"><a>لابردن</a></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td dir="rtl">
                                وەسڵی داواکراو نەتوانرا بدۆزرێتەوە
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="paginate">
                {{ $post->links('vender.custom') }}
            </div>
        </div>
    </section>
@endsection
