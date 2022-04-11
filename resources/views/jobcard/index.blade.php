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
            padding: -25px;
            font-family: 'NRT-Reg';
            letter-spacing: 0.2rem;
        }

    </style>
    <section class="main">
        <div class="customer-section">
            <div class="heading">
                <h1 dir="rtl"><i class="fas fa-briefcase"></i> ئیشەکان</h1>
            </div>
            <div class="upper-section">
                <div class="search">
                    <form action="searchjobcard" method="get">
                        <input type="search" id="search1" name="searchjobcard" value="{{request('searchjobcard')}}">
                        &nbsp;<button class="btn" type="submit" id="searchdel">
                            <span> گەڕان </span>
                        </button>
                    </form>
                </div>
                <a href="{{ route('jobcard.create') }}" class="btn"><span  class="font_NRT-Reg">زیادکردنی ئیش </span> </a>

            </div>
            <table class="table-fill table-employee" id="germany">
                <thead>
                    <tr>
                        <th class="text-left">ناوی موشتەری</th>
                        <th class="text-left">مۆدێلی سەیارە</th>
                        <th class="text-left">بەرواری دەستپێک</th>
                        <th class="text-left">بەرواری تەواوبوون</th>
                        <th class="text-left">کارمەندی چاککردنەوە</th>
                        <th class="text-left">چاککردن</th>
                        <th class="text-left">لابردن</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($post as $jobcard)
                        <tr>
                            <td class="text-left">{{ $jobcard->customerName }}</td>
                            <td class="text-left">{{ $jobcard->vehicleBrand }}</td>
                            <td class="text-left">{{ $jobcard->inDate }}</td>
                            <td class="text-left">{{ $jobcard->outDate }}</td>
                            <td class="text-left">{{ $jobcard->asignedTo }}</td>
                            <td class="text-left"><a
                                    href="{{ route('jobcard.edit', ['jobcard' => $jobcard->id]) }}">چاککردن</a></td>
                            <td class="text-left">
                                {{-- we use this term route() to go back to the controller, we use "" to go back to view. --}}
                                <form action="{{ route('jobcard.destroy', ['jobcard' => $jobcard->id]) }}" method="POST"
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
                                ئیشی داواکراو نەتوانرا بدۆزرێتەوە
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
