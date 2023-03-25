@extends('layouts.default')
@section('title')
    Preferences
@endsection
@section('content')
    <style>
        .box {
            position: relative;
        }
        .box .text {
            position: absolute;
            z-index: 999;
            text-align: center;
            bottom: 50%;
            left: 0;
            /*background: rgba(178, 0, 0, 0.8);*/
            background: linear-gradient(to bottom,rgba(9,52,116,.1),rgba(255,255,255,.5) 40%,rgba(255,255,255,.6) 50%,rgba(255,255,255,.5) 60%,rgba(9,52,116,.1));
            font-family: Arial,sans-serif;
            color: #fff;
            width: 100%; /* Set the width of the positioned div */
            height: 10%;
            color: #093474;
        }
        label.btn.btn-outline-primary {
            margin: 5px 5px 5px 5px;
        }
    </style>
    <section class="section section--marketplace">
        {{--<div class="c-breadcrumbs">
            <ul id="ember15" class="breadcrumbs ember-view">
                <li id="ember27" class="ember-view">
                    <a href="/marketplace" id="ember28" class="ember-view">Marketplace</a>
                </li>
                <li id="ember29" class="ember-view"> {{ $product?->category?->trans?->name }}</li>
                <li id="ember30" class="ember-view"> {{ $product?->trans?->name }}</li>
            </ul>
        </div>--}}
        <section class="section section--product">
            <div class="container-fluid section--product mt-2 mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <form id="frm_about">
                            <div class="card">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="d-flex align-items-center mt-2 mb-1">
                                        <h3>About you</h3>
                                    </div>
                                </div>
                                <div class="row m-2">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-auto mt-1">
                                                Date of Birth
                                            </div>
                                            <div class="col-auto">
                                                <select name="birth_month" class="form-control about-field">
                                                    <option disabled="" selected="">Month</option>
                                                    <option value="1" @if($info->birth_month == '1') selected @endif >January</option>
                                                    <option value="2" @if($info->birth_month == '2') selected @endif >February</option>
                                                    <option value="3" @if($info->birth_month == '3') selected @endif >March</option>
                                                    <option value="4" @if($info->birth_month == '4') selected @endif >April</option>
                                                    <option value="5" @if($info->birth_month == '5') selected @endif >May</option>
                                                    <option value="6" @if($info->birth_month == '6') selected @endif >June</option>
                                                    <option value="7" @if($info->birth_month == '7') selected @endif >July</option>
                                                    <option value="8" @if($info->birth_month == '8') selected @endif >August</option>
                                                    <option value="9" @if($info->birth_month == '9') selected @endif >September</option>
                                                    <option value="10" @if($info->birth_month == '10') selected @endif >October</option>
                                                    <option value="11" @if($info->birth_month == '11') selected @endif >November</option>
                                                    <option value="12" @if($info->birth_month == '12') selected @endif >December</option>
                                                </select>
                                            </div>
                                            <div class="col-auto">
                                                @php
                                                    $current_year = date('Y');
                                                    $year_range = range($current_year, $current_year - 90);
                                                @endphp
                                                <select name="birth_year" class="form-control about-field">
                                                    <option disabled="" selected="">Year</option>
                                                    @foreach ($year_range as $number)
                                                        <option value="{{$number}}" @if($info->birth_year == $number) selected @endif >{{ $number }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-auto mt-1">
                                                Gender
                                            </div>
                                            <div class="col-auto">
                                                <div class="btn-group">
                                                    <input type="radio" class="btn-check about-field" name="gender" id="male" autocomplete="off" value="male" @if($info->gender == 'male') checked @endif />
                                                    <label class="btn btn-outline-primary" for="male">Male</label>

                                                    <input type="radio" class="btn-check about-field" name="gender" id="female" autocomplete="off" value="female" @if($info->gender == 'female') checked @endif />
                                                    <label class="btn btn-outline-primary" for="female">Female</label>

                                                    <input type="radio" class="btn-check about-field" name="gender" id="other" autocomplete="off" value="other" @if($info->gender == 'other') checked @endif />
                                                    <label class="btn btn-outline-primary" for="other">Other</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row m-2">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-auto mt-1">
                                                Profession
                                            </div>
                                            <div class="col-auto">
                                                <div class="btn-group">
                                                    <input type="radio" class="btn-check about-field" name="profession" id="student" autocomplete="off" value="student" @if($info->profession == 'student') checked @endif />
                                                    <label class="btn btn-outline-primary" for="student">Student</label>

                                                    <input type="radio" class="btn-check about-field" name="profession" id="employed" autocomplete="off" value="employed" @if($info->profession == 'employed') checked @endif />
                                                    <label class="btn btn-outline-primary" for="employed">Employed</label>

                                                    <input type="radio" class="btn-check about-field" name="profession" id="unemployed" autocomplete="off" value="unemployed" @if($info->profession == 'unemployed') checked @endif />
                                                    <label class="btn btn-outline-primary" for="unemployed">Unemployed</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-auto mt-1">
                                                Income
                                            </div>
                                            <div class="col-auto">
                                                <div class="btn-group">
                                                    <input type="radio" class="btn-check about-field" name="income" id="0-29k" autocomplete="off" value="0-29k" @if($info->income == '0-29k') checked @endif />
                                                    <label class="btn btn-outline-primary" for="0-29k">0 - 29k</label>

                                                    <input type="radio" class="btn-check about-field" name="income" id="30-45k" autocomplete="off" value="30-45k" @if($info->income == '30-45k') checked @endif />
                                                    <label class="btn btn-outline-primary" for="30-45k">30 - 45k</label>

                                                    <input type="radio" class="btn-check about-field" name="income" id="45-60k" autocomplete="off" value="45-60k" @if($info->income == '45-60k') checked @endif />
                                                    <label class="btn btn-outline-primary" for="45-60k">45 - 60k</label>

                                                    <input type="radio" class="btn-check about-field" name="income" id="60k+" autocomplete="off" value="60k+" @if($info->income == '60k+') checked @endif />
                                                    <label class="btn btn-outline-primary" for="60k+">60k+</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row m-2 mb-4">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-auto mt-1">
                                                Have you used an AdBlocker before
                                            </div>
                                            <div class="col-auto">
                                                <div class="btn-group">
                                                    <input type="radio" class="btn-check about-field" name="adBlocker" id="yes" autocomplete="off" value="yes" @if($info->adblocker_used == 1) checked @endif />
                                                    <label class="btn btn-outline-primary" for="yes">Yes</label>

                                                    <input type="radio" class="btn-check about-field" name="adBlocker" id="no" autocomplete="off" value="no" @if($info->adblocker_used == 0) checked @endif />
                                                    <label class="btn btn-outline-primary" for="no">No</label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--product">
            <div class="container-fluid section--product mt-2 mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <form id="frm_category">
                            <div class="card">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="d-flex align-items-center mt-2 mb-1">
                                        <h3>Preferences</h3>
                                    </div>
                                </div>

                                <form id="frm_category">
                                    <div class="row m-2">
                                        @if(isset($categories))
                                            @foreach($categories as $k => $item)
                                                <div class="col-md-3">
                                                    <div class="card">
                                                        {{--<img class="card-img-top" src="{{ asset('uploads/categories/'.$item?->trans?->img) }}" alt="Card image cap">--}}
                                                        <div class="card-img-overlay box">
                                                            <img class="card-img-top" src="{{ asset('uploads/categories/'.$item?->trans?->img) }}" alt="Card image" style="width:100%">
                                                            <h4 class="card-title text">{{ $item->trans->name }}</h4>
                                                        </div>
                                                        <div class="card-block">
                                                            <div class="subcategory__options">

                                                                @if (isset($item->children))
                                                                    @foreach($item->children as $k => $child)
                                                                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                                            <input type="checkbox" class="btn-check category-field"
                                                                                   name="category_ids"
                                                                                   id="category-{{$child->id}}"
                                                                                   autocomplete="off"
                                                                                   value="{{$child->id}}"
                                                                                   @if(in_array($child->id, $preferences)) checked @endif
                                                                            />
                                                                            &nbsp;&nbsp;<label class="btn btn-outline-primary check-btn" for="category-{{$child->id}}">{{ $child->trans->name }}</label>
                                                                        </div>
                                                                    @endforeach
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </form>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.about-field').change(function(){
            $("#frm_about").ajaxSubmit({url: '{{ route('user.dashboard.update-about') }}', type: 'post'})
        });

        $('.category-field').change(function(){
            $("#frm_category").ajaxSubmit({url: '{{ route('user.dashboard.update-category') }}', type: 'post'})
        });
    </script>
@endsection

