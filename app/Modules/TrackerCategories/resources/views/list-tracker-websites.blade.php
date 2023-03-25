@extends('layouts.admin')
@section('title')
   Web Tracker Categories
@endsection
@section('content')
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Tracker Websites List</h1>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mt-4">
                    {{-- <a href="{{ route('admin.categories.add') }}" class="btn btn-primary btn-flat btn-addon m-l-5" >
                        <i class="ti-plus"></i>
                        Add Category
                    </a> --}}
                </div>

                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.tracker-categories') }}">Categories</a></li>
                                <li class="breadcrumb-item active">Websites</li>

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
                                <h4>Tracker Websites List </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Website</th>




                                            <th class="text-left">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($items))
                                            @foreach($items as $k => $item)
                                                <tr>
                                                    <th scope="row">{{ $k + 1 }}</th>
                                                    <td class="user_name_col_{{ $item->id }}">
                                                            {{ $item->website }}
                                                    </td>
                                                    <td class="text-left">
                                                        <a href="{{ route('admin.categories.edit', $item->id) }}" class="btn btn-success btn-flat btn-addon m-l-5" >
                                                            <i class="ti-pencil"></i>
                                                            Edit
                                                        </a>

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

            </section>
        </div>
    </div>
@stop
