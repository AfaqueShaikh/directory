@extends('layouts.admin')
@section('title')
    Edit User
@endsection
@section('content')
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Users, <span>Edit User</span></h1>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                {{--                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>--}}
                                <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users</a></li>
                                <li class="breadcrumb-item active">Edit User</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>

            <!-- /# row -->
            <section id="main-content">

                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Edit User</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('admin.users.update', $item->id) }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name', $item->name) }}" />
                                                    @error('name')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Username">Username</label>
                                                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username', $item->username) }}" />
                                                    @error('username')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email', $item->email) }}" />
                                                    @error('email')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" name="password" placeholder="Password" />
                                                    @error('password')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="confirm_password">Confirm Password</label>
                                                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" />
                                                    @error('confirm_password')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{--<div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="description">Image</label>
                                                    <input type="file" class="form-control" name="image" />
                                                    @error('image')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>--}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select id="status" name="status" class="form-control">
                                                        <option value="">Select Status</option>
                                                        <option value="0" @if ((isset($item) && $item->status == '0') || old('status') == '0') selected @endif>InActive
                                                        </option>
                                                        <option value="1" @if ((isset($item) && $item->status == '1') || old('status') == '1') selected @endif>Active
                                                        </option>
                                                        @if (request()->is('*/edit'))
                                                            <option value="2" @if (isset($item) && $item->status == '2') selected @endif>Block
                                                            </option>
                                                            <option value="3" @if (isset($item) && $item->status == '3') selected @endif>Suspend
                                                            </option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        @if (request()->is('*/edit'))
                                            <input type="hidden" name="user_id" value="{{ $item->id }}">
                                            <input type="hidden" name="old_user_email" value="{{ $item->email }}">
                                        @endif
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
@stop
