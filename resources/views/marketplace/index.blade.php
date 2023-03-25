@extends('layouts.default')
@section('title')
    Marketplace
@endsection
@section('header')
    <style>
        .top-container {
            background-color: #f1f1f1;
            padding: 30px;
            text-align: center;
        }

        .header {
            /*padding: 10px 16px;*/
            /*background: #555;*/
            /*color: #f1f1f1;*/
        }

        .content {
            padding: 16px;
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }

        .sticky + .content {
            /*padding-top: 102px;*/
            padding-top: 152px;
        }

        .header .category-nav {
            background: #f9fcfe;
            /*padding: 1rem 0 0;*/
            padding: 15px;
            z-index: 5;
            margin-bottom: 5rem;
            text-align: center;
        }

        .nav-items .nav-item {
            background: #fff;
            box-shadow: 0 5px 26px rgb(0 0 0 / 6%);
            border-radius: 5px;
            color: #093474;
            padding: 0.8rem 1rem;
            margin-bottom: 1rem;
            transition: all 250ms ease-in-out;
        }
        .product-list {
            padding-bottom: 3.5rem;
        }
        .marketplace-item {
            flex: 0 0 auto;
            width: calc(33% - 1.875rem);
            margin-left: 0.9375rem;
            margin-right: 0.9375rem;
        }
        .marketplace-item {
            /*display: block;*/
            display: inline-block;
            color: inherit;
            background: #fff;
            box-shadow: 0 5px 26px rgb(0 0 0 / 6%);
            text-align: center;
            margin-bottom: 1rem;
            transition: box-shadow 250ms ease-in-out;
        }
        a {
            line-height: inherit;
            color: #105ac9;
            text-decoration: none;
            cursor: pointer;
            transition: background-color ease-in-out 250ms,color ease-in-out 250ms;
        }
        .marketplace-item .c-product-item {
            height: 100%;
        }
        .c-product-item {
            box-shadow: 0 5px 26px rgb(0 0 0 / 6%);
            justify-content: space-between;
        }
        .c-product-item__body {
            margin-bottom: 1.5rem;
            position: relative;
            width: 100%;
        }
        .marketplace-item .c-product-item__img {
            width: 100%;
        }
        .c-product-item__footer {
            flex: 0 0 auto;
            height: auto;
            width: 100%;
            padding: 0 1.4rem 1.4rem;
        }
    </style>
@endsection
@section('content')
    <div class="content">
        <div class="top-container">
            <h3>Marketplace</h3>
            <p>Redeem your points here! Choose a charity to support, find great deals, or purchase items with your Au points.</p>
            <a href="#" class="link-info">How can I earn points more quickly?</a>
        </div>

        <div class="header" id="myHeader">
            <nav class="category-nav">
                <div class="nav-items">
                    @if(isset($categories))
                        @foreach($categories as $k => $item)
                            <a href="#{{ $item->slug }}" class="nav-item">{{ $item->trans->name }}</a>
                            {{--<a href="#charities" class="nav-item">Support a Cause</a>
                            <a href="#offers" class="nav-item">Exclusive Offers</a>
                            <a href="#giftcards" class="nav-item">Gift Cards</a>
                            <a href="#merchandise" class="nav-item">Merchandise</a>--}}
                        @endforeach
                    @endif
                </div>
            </nav>
        </div>

        <div class="content">
            <div class="categories">
                @if(isset($categories))
                    @foreach($categories as $k => $item)
                        <h2 id="{{ $item->slug }}" class="list-heading">{{ $item->trans->name }}</h2>
                        <div class="product-list">
                            @if(isset($item->products))
                                @foreach($item->products as $key => $product)
                                    <div class="marketplace-item">
                                        <a href="{{ route('user.marketplace.productDetail', [$item->slug, $product->slug]) }}" id="ember43" class="ember-view marketplace-item__link">
                                            <article class="c-product-item">

                                                <div class="c-product-item__body">
                                                    @if($product->trans->image)
                                                    <img loading="lazy" class="c-product-item__img" src="{{ asset('uploads/products/'.$product?->trans?->image) }}" alt="UK Black Pride" width="512" height="351">
                                                    @endif
                                                </div>

                                                <div class="c-product-item__footer">
                                                    <h3 class="c-product-item__title">{{ $product->trans->name }}</h3>

                                                    <div class="c-product-item__price">
                                                        <div class="c-product-item__amount">
                                                            <div class="c-token-amount">
                                                                <i class="icon-g8-logo"></i>

                                                                @if($item->slug != 'support-a-cause')
                                                                {{ $product->price }} Coins
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <progress max="1500" value="1500" class="c-progress-bar" data-label="100%"></progress>

                                                </div>
                                            </article>
                                        </a>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
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
