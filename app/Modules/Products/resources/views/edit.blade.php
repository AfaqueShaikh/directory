@extends('layouts.admin')
@section('title')
    Edit Product
@endsection
@section('content')
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Products, <span>Edit Product</span></h1>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                {{--                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>--}}
                                <li class="breadcrumb-item"><a href="{{ route('admin.categories') }}">Products</a></li>
                                <li class="breadcrumb-item active">Edit Product</li>
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
                                <h4>Edit Product</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('admin.products.update', $item->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category_id">Category</label>
                                                    <select class="form-control" id="category_id" name="category_id" placeholder="Product" >
                                                        <option value="0" selected >Category</option>
                                                        @if(isset($category))
                                                            @foreach($category as $cat)
                                                                <option
                                                                    value="{{ $cat->id }}"
                                                                    @if (old('category_id', $item->category_id) == $cat->id) selected @endif
                                                                >{{ $cat->trans->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @error('category_id')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name', $item->trans->name) }}" />
                                                    @error('name')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" name="description" placeholder="Description" >{{ old('description', $item->trans->description) }}</textarea>
                                                    @error('description')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price', $item->price) }}" />
                                                    @error('price')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="description">Image</label>
                                                    <input type="file" class="form-control" name="image" accept="image/*" />
                                                    @error('image')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <img src="{{ asset('uploads/products/'.$item?->trans?->image) }}"
                                                         style="height: 100px; width: 150px;" />
                                                    <input type="hidden" name="old_image" value="{{ $item?->trans?->image }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{--<label for="active">Status</label>--}}
                                                    <div class="checkbox">
                                                        <label for="active">
                                                            <input type="checkbox" id="active" name="active" value="1" @if (isset($item->active) && $item->active === 1) checked @endif> Active
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
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
