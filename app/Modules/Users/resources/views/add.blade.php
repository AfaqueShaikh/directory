@extends('layouts.admin')
@section('title')
    Add User
@endsection
@section('content')
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Users, <span>Add User</span></h1>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                {{--                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>--}}
                                <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users</a></li>
                                <li class="breadcrumb-item active">Add User</li>
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
                                <h4>Add User</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('admin.users.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" class="form-control" required name="full_name" placeholder="Full Name" value="{{ old('name') }}" />
                                                    @error('name')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Mobile</label>
                                                    <input type="text" class="form-control" name="mobile" placeholder="Mobile" value="{{ old('email') }}" />
                                                    @error('mobile')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select id="status" name="status" class="form-control">
                                                        <option value="">Select Area</option>
                                                        @foreach($areas as $area)
                                                            <option value="{{$area->id}}" >{{$area->name}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Address line 1</label>
                                                    <input type="text" class="form-control" name="address_1" placeholder="Address Line 1" required value="" />

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Address line 2</label>
                                                    <input type="text" class="form-control" name="address_2" placeholder="Address Line 2"  value="" />

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Business Name (if any)</label>
                                                    <input type="text" class="form-control" name="business_name" placeholder="Business Name"  value="" />

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Business Address</label>
                                                    <textarea  class="form-control" style="height:150px" rows="3" name="business_address" placeholder="Business Business Address"  ></textarea>

                                                </div>
                                            </div>



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


                                        <div class="row">
                                            <div id="relations">
                                                <!-- initial fields for relation name, name, and contact number -->
                                                <div class="relation form-row mb-2">
                                                  <div class="col">
                                                    <label for="relation1">Relation:</label>
                                                    <input type="text" required id="relation1" name="relation[]" class="form-control" required>
                                                  </div>
                                                  <div class="col">
                                                    <label for="name1">Name:</label>
                                                    <input type="text" id="name1" required name="name[]" class="form-control" required>
                                                  </div>
                                                  <div class="col">
                                                    <label for="contact1">Contact Number:</label>
                                                    <input type="text" id="contact1" required name="contact[]" class="form-control" required>
                                                    Mask It<input type="checkbox" value="1" />

                                                  </div>
                                                  <div class="col d-flex align-items-center">
                                                    <button type="button" class="btn btn-danger delete-relation">&times;</button>
                                                  </div>
                                                </div>
                                              </div>
                                              <button id="add-relation" style="height: 50px;" class="btn btn-primary ">Add Relation</button>

                                        </div>
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

@section('footer')
<script>
    // counter to keep track of the number of relation fields
    let relationCounter = 1;

    const addRelation = () => {
      // increment the counter
      relationCounter++;

      // create a new relation div with the appropriate fields
      const newRelation = `
        <div class="relation form-row mb-2">
          <div class="col">
            <label for="relation${relationCounter}">Relation:</label>
            <input type="text" id="relation${relationCounter}" name="relation[]" class="form-control" required>
          </div>
          <div class="col">
            <label for="name${relationCounter}">Name:</label>
            <input type="text" id="name${relationCounter}" name="name[]" class="form-control" required>
          </div>
          <div class="col">
            <label for="contact${relationCounter}">Contact Number:</label>
            <input type="text" id="contact${relationCounter}" name="contact[]" class="form-control" required>
          </div>
          <div class="col d-flex align-items-center">
            <button type="button" class="btn btn-danger delete-relation">&times;</button>
          </div>
        </div>
      `;

      // add the new relation div to the relations container
      const relationsContainer = document.querySelector('#relations');
      relationsContainer.insertAdjacentHTML('beforeend', newRelation);

      // attach event listener to delete button
      const deleteButtons = document.querySelectorAll('.delete-relation');
      deleteButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
          event.target.closest('.relation').remove();
        });
      });
    };

    // attach event listener to "Add Relation" button
    const addRelationButton = document.querySelector('#add-relation');
    addRelationButton.addEventListener('click', addRelation);

    // attach event listener to initial delete button
    const initialDeleteButton = document.querySelector('.delete-relation');
    initialDeleteButton.addEventListener('click', (event) => {
      event.target.closest('.relation').remove();
    });
  </script>
@endsection
