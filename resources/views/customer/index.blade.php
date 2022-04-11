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
            <div class="heading" dir="rtl">
                <h1 ><i class="fas fa-user-friends"><span>موشتەریەکان</span></i></h1>
            </div>
            <div class="upper-section">
                <div class="search">
                    <form action="search" method="get">
                        <input type="search" id="search1" name="search" value="{{request('search')}}">
                        &nbsp;<button class="btn" type="submit" id="searchdel">
                            گەڕان 
                        </button>
                    </form>
                </div>
                <a href="{{ route('customer.create') }}" class="btn"> زیادکردنی موشتەری</a>
            </div>
            <table class="table-fill">
                <thead>
                    <tr>
                        <th class="text-left"> ناوی موشتەری</th>
                        <th class="text-left"> ژمارەی مۆبایل </th>
                        <th class="text-left">چاککردن</th>
                        <th class="text-left">زیاتر</th>
                        <th class="text-left">لابردن</th>
                    </tr>
                </thead>
                <tbody class="table-hover">
                    @forelse ( $post as $customer)
                        <tr>
                            <td class="text-left">{{ $customer->customerName }}</td>
                            <td class="text-left">{{ $customer->mobileNumber }}</td>
                            <td class="text-left"><a
                                    href="{{ route('customer.edit', ['customer' => $customer->id]) }}">چاککردن</a></td>
                            <td class="text-left"><a
                                    href="{{ route('customer.show', ['customer' => $customer->id]) }}">زیاتر</a></td>
                            <td class="text-left">
                                <form action="{{ route('customer.destroy', ['customer' => $customer->id]) }}"
                                    method="POST" class="table-moi">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete-moi" class="text-left" class="delete-moi"><a>لابردن</a></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td dir="rtl">
                                موشتەری داواکراو نەتوانرا بدۆزرێتەوە
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                
            </table>
            <div class="paginate">
                {{ $post->links('vender.custom') }}
            </div>
    </section>
@endsection
