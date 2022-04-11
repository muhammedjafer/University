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

        #searchdelm {
            background-color: #1a535c;
            font-size: 1.8rem;
            color: var(--text-color-sidebar);
            padding: 1rem 1.8rem;
            transition: all 0.3s;
        }

        #searchdel {
            background-color: #1a535c;
            font-size: 1.8rem;
            color: var(--text-color-sidebar);
            padding: 1rem 1.8rem;
            transition: all 0.3s;
        }

        #searchdel:hover {
            background-color: #23727e;
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

        #selectfrench {
            padding: 8px 12px;
            color: white;
            background-color: #1a535c;
            border: 1px solid #1a535c;
            cursor: pointer;
            border-radius: 5px;
            font-family: 'NRT-Reg';
            font-size: 14px;
            text-align: center;
            margin-top: -4px;

            /** Remove the default style*/
        }

        #selectfrench:focus,
        #selectfrench:hover {
            outline: none;
            border: 1px solid I#bbbbbb;
        }

        #selectfrench option span {
            padding: 8px;
            background-color: white;
            transition: all 0.3s;
        }

        #selectfrench option span:hover {
            background-color: #7ed2df;
        }

        * {
            font-family: 'NRT-Reg';
            letter-spacing: 0.2rem;
        }

    </style>
    <section class="main">
        <div class="customer-section">
            <div class="heading">
                <h1 dir="rtl"><i class="fas fa-user-friends"></i> کارمەندەکان</h1>
            </div>
            <div class="upper-section">
                <div class="search">
                    <form action="searchemployee" method="get">
                        <input type="search" id="search1" name="searchemployee" value="{{ request('searchemployee') }}">
                        &nbsp;<button class="btn" type="submit" id="searchdelm">
                            گەڕان
                        </button>
                        <label for="selectfrench" style="margin-left: 4px; padding-bottom: 14px;" id="searchdel"
                            class="btn" style="padding: 4px;" dir="rtl"> گەڕان بەپێی:
                            <select action="search" method="get" name="selection" id="selectfrench"
                                style="margin-bottom: 12px;">
                                <option value="employeeName" selected> ناوی کارمەند </option>
                                <option value="Designation">لێهاتوویی</option>
                            </select></label>
                    </form>
                </div>
                <a href="{{ route('employee.create') }}" class="btn">زیادکردنی کارمەند</a>
            </div>
            <table class="table-fill table-employee">
                <thead>
                    <tr>
                        <th class="text-left">ناوی کارمەند</th>
                        <th class="text-left">ژمارەی مۆبایل</th>
                        <th class="text-left">لێهاتوویی</th>
                        <th class="text-left">چاککردن</th>
                        <th class="text-left">زیاتر</th>
                        <th class="text-left">لابردن</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($post as $employee)
                        <tr>
                            <td class="text-left">{{ $employee->employeeName }}</td>
                            <td class="text-left">{{ $employee->mobileEmployee }}</td>
                            <td class="text-left">{{ $employee->Designation }}</td>
                            <td class="text-left">
                                <a href="{{ route('employee.edit', ['employee' => $employee->id]) }}">چاککردن</a>
                            </td>
                            <td class="text-left"><a
                                    href="{{ route('employee.show', ['employee' => $employee->id]) }}">زیاتر</a></td>
                            <td class="text-left">
                                <form action="{{ route('employee.destroy', ['employee' => $employee->id]) }}"
                                    method="POST" class="table-moi">
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
                                کارمەندی داواکراو نەتوانرا بدۆزرێتەوە
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
