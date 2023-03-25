@extends('layouts.default')
@section('title')
    My Details
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
        <section class="section section--product">
            <div class="container-fluid section--product mt-2 mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <form name="frm_update" action="{{ route('user.dashboard.accountUpdate') }}" method="post">
                            @csrf
                            <div class="card">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="d-flex align-items-center mt-2 mb-1">
                                        <h3>My Details</h3>
                                    </div>
                                </div>
                                <div class="row m-2">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" disabled class="form-control" id="email" name="email" value="{{ $user->email }}" />
                                        <small>Social sign-in was used for your account, your email address cannot be updated</small>
                                    </div>
                                </div>
                                <div class="row m-2 mb-4">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="d-flex align-items-center mt-2 mb-1">
                                                <button type="submit" class="btn btn-lg btn-primary btn-round" >Save</button>
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

    </section>
@endsection

