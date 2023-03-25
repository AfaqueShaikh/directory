@extends('layouts.default')
@section('title')
    Checkout
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
                <li id="ember29" class="ember-view"> Checkout</li>
            </ul>
        </div>
        <section class="section section--product">
            <div class="container section--product mt-2 mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkout-form py-5">
                                        <form method="post" action="{{ route('marketplace.proceed-to-checkout')}}">

                                            @if($product?->category->slug == 'support-a-cause')
                                            <div class="form-group">

                                                <input type="number" class="form-control" onkeyup="updatePoints()" id="price" name="price" aria-describedby="emailHelp" placeholder="Donate Points" required>
                                              </div>
                                            @endif

                                            @if($product->category_id == 4)
                                            <div class="form-group">

                                              <input type="text" class="form-control" id="full_name" name="full_name" aria-describedby="emailHelp" placeholder="Enter Full Name" required>
                                            </div>
                                            <br>
                                            <div class="form-group">

                                              <input type="text" class="form-control" id="phone_number" name="phone_number" aria-describedby="emailHelp" placeholder="Enter Phone Number" required>
                                            </div>
                                            <br>
                                            <div class="form-group">

                                              <input type="text" class="form-control" id="state" name="state" aria-describedby="emailHelp" placeholder="State" required>
                                            </div>
                                            <br>
                                            <div class="form-group">

                                              <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp" placeholder="City" required>
                                            </div>
                                            <br>
                                            <div class="form-group">

                                              <input type="text" class="form-control" id="address1" name="address1" aria-describedby="emailHelp" placeholder="House No. , Building Name" required>
                                            </div>
                                            <br>
                                            <div class="form-group">

                                              <input type="text" class="form-control" id="address2" name="address2" aria-describedby="emailHelp" placeholder="Road name, Area, Colony" required>
                                            </div>

                                            @endif
                                            <input type="hidden" class="form-control" value="{{$product->id}}" name="product_id" >

                                            @if($product?->category->slug != 'support-a-cause')
                                            <input type="hidden" class="form-control" name="price" value="{{$product?->price}}">
                                            @endif

                                            <br>
                                            <div class="checkout__btn">
                                                <button
                                                    class="btn btn-success btn-block"
                                                        type="submit"
                                                        data-ember-action=""
                                                        data-ember-action-351="351"

                                                >
                                                @if($product?->category->slug == 'support-a-cause')
                                                <i class="fa fa-lock"></i> <span>Confirm and Donate</span>
                                                @else
                                                <i class="fa fa-lock"></i> <span>Confirm and Pay</span>
                                                @endif


                                            </button>
                                            </div>
                                          </form>





                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="images p-3">
                                        <div class="text-center p-4">
                                            <img
                                                class="main-image"
                                                id="main-image"
                                                src="{{ asset('uploads/products/'.$product?->trans?->image) }}"
                                            />
                                        </div>
                                    </div>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>
                                                Item
                                            </th>
                                            <th>
                                                Points
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                {{ $product?->trans?->name }}
                                            </td>
                                            <td>
                                                <span id="result-points1"></span>

                                                @if($product?->category->slug != 'support-a-cause')
                                                <span class="result-points">{{$product?->price}}</span>

                                             @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td>
                                                Total
                                            </td>
                                            <td>
                                                <span id="result-points2"></span>
                                                @if($product?->category->slug != 'support-a-cause')
                                                <span class="result-points">{{$product?->price}}</span>

                                            @endif
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
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

        function updatePoints(){


            document.getElementById('result-points1').textContent= document.getElementById('price').value;
            document.getElementById('result-points2').textContent= document.getElementById('price').value;
            // $(".result-points").html("sdasda")

        }
    </script>
@endsection
