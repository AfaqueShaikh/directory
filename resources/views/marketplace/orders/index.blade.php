@extends('layouts.default')
@section('title')
    Orders
@endsection
@section('header')
    <style>
        .section--marketplace {
            background: #f9fcfe;
            padding-top: 5px;
        }
        .c-breadcrumbs {
            padding-right: 0.9375rem;
            padding-left: 0.9375rem;
        }
        .breadcrumbs {
            flex: 0 0 auto;
            width: calc(100% - 1.25rem);
            margin-left: 0.625rem;
            margin-right: 0.625rem;
            /*margin: 0;*/
            list-style: none;
        }
        .breadcrumbs li {
            float: left;
            font-size: .7875rem;
            color: #093474;
            cursor: default;
            text-transform: uppercase;
        }
        .breadcrumbs li:not(:last-child)::after {
            position: relative;
            margin: 0 0.75rem;
            opacity: 1;
            content: "/";
            color: #cacaca;
        }
        .c-breadcrumbs a {
            line-height: inherit;
            color: #105ac9;
            text-decoration: none;
            cursor: pointer;
            transition: background-color ease-in-out 250ms,color ease-in-out 250ms;
        }
        .section--product {
            padding-top: 1rem;
            background: #f9fcfe;
        }
        .main-image {
            width: 80%;
            height: 80%;
            object-fit: contain;
        }
        .checkout-form {
            flex: 0 0 auto;
            /*width: calc(50% - 1.25rem);*/
            margin-left: 0.625rem;
            margin-right: 0.625rem;
        }
        .checkout-form table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 1rem;
            border-radius: 0;
        }
        .table thead tr {
            border-bottom: 1px solid #105ac9;
        }
        .table tfoot td, .table thead td {
            font-weight: 400;
        }
        .checkout__btn {
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <section class="section section--marketplace">
        <div class="c-breadcrumbs">
            <ul id="ember15" class="breadcrumbs ember-view">
                <li id="ember27" class="ember-view">
                    <a href="/marketplace" id="ember28" class="ember-view">Marketplace</a>
                </li>
                <li id="ember29" class="ember-view"> Orders</li>
            </ul>
        </div>
        <section class="section section--product">
            <div class="container section--product mt-2 mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="checkout-form py-5">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>
                                                    Item
                                                </th>
                                                <th>
                                                    Points
                                                </th>
                                                <th>
                                                    Date
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($orders))
                                                @foreach($orders as $k => $item)
                                                    <tr>
                                                        <td>

                                                            {{ $item?->product?->trans?->name }}
                                                        </td>
                                                        <td>
                                                            {{ $item?->price }}
                                                        </td>
                                                        <td>
                                                            {{ $item?->created_at }}
                                                        </td>
                                                        <td>
                                                            {{ ucfirst($item?->status) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
@section('footer')
    <script>
        window.onscroll = function() {myFunction()};

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    </script>
@endsection
