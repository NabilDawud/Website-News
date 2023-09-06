@extends('cms.parent')

@section('title', 'Edit Admin')
@section('main-title', 'Edit Admin')
@section('sub-title', 'Edit Admin')


@section('styles')

@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Data For Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group">
                                            <label style="width: 100%;text-align: center;" class="bg-info">City Name</label>
                                            <select class="form-control select2 select2-danger" name="city_id"
                                                id="city_id" data-dropdown-css-class="select2-danger"
                                                style="width:100%; text-align: center;">
                                                {{--  <option selected="selected">Alabama</option>  --}}
                                                @foreach ($cities as $city)

                                                    <option  @if($city->id == $admins->user->city_id) selected
                                                        @endif
                                                        value="{{ $city->id }}"> {{ $city->name }} </option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="first_name">First Name of Admin</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                         value="{{ $admins->user->first_name }}"   placeholder="Enter First Name of Admin">
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="last_name">Enter Last Name of Admin</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                        value="{{ $admins->user->last_name }}"    placeholder="Enter Last Name of Admin">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6" style="margin: auto;">
                                        <label for="email" style="width: 100%;text-align: center;">Email of Admin</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $admins->email }}"   placeholder="Enter Email of Admin" style="width:100%; text-align: center; ">
                                    </div>
                                    {{--  <div class="form-group  col-md-6">
                                        <label for="password">Password Name of Admin</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password Name of Admin">
                                    </div>  --}}
                                </div>

                                <div class="row">
                                    <div class="form-group  col-md-6">
                                        <label for="mobile">Enter Mobile of Admin</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                        value="{{ $admins->user->mobile }}"    placeholder="Enter Mobile of Admin">
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="address">Enter Address of Admin</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                        value="{{ $admins->user->address }}"   placeholder="Enter Address of Admin">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group  col-md-6">
                                        <label for="date">Enter Date of Admin</label>
                                        <input type="date" class="form-control" id="date" name="date"
                                        value="{{ $admins->user->date }}"   placeholder="Enter Date of Admin">
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="image">Choose File</label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            placeholder="Choose File">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group  col-md-6">
                                        <label for="gender">Gender</label>
                                        <select  name="gender" id="gender" class="form-select form-select-sm" style="width: 100%; height: 40px; outline: 0; opacity: .45; border-radius: 4px" >
                                            @if($admins->user->gender == 'Male')
                                            <option selected value="Male">Male</option>
                                            <option value="Female">female</option>
                                            @else
                                            <option  value="Male">Male</option>
                                            <option selected value="Female">female</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="status">status</label>
                                        <select name="status" id="status" class="form-select form-select-sm" style="width: 100%; height: 40px; outline: 0; opacity: .45; border-radius: 4px">
                                            <option selected  hidden >{{ $admins->user->status}} </option>
                                            <option  value="Active">Active</option>
                                            <option  value="Inactive">Inactive</option>
                                            {{--  @if($admins->user->status == 'Active')
                                            <option selected value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                            @else
                                            <option  value="Active">Active</option>
                                            <option selected value="Inactive">Inactive</option>
                                            @endif  --}}
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" onclick="performUpdate({{ $admins->id }})" class="btn btn-primary">Update</button>

                                <a href="{{ route('admins.index') }}" class="btn btn-info">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                    <!-- general form elements -->

                    <!-- /.card -->

                    <!-- Input addon -->

                    <!-- /.card -->
                    <!-- Horizontal Form -->

                    <!-- /.card -->

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection

@section('scripts')

    <script>
        function performUpdate(id) {

            let formData = new FormData();
            formData.append('first_name', document.getElementById('first_name').value);
            formData.append('last_name', document.getElementById('last_name').value);
            formData.append('mobile', document.getElementById('mobile').value);
            formData.append('address', document.getElementById('address').value);
            formData.append('date', document.getElementById('date').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('status', document.getElementById('status').value);
            formData.append('email', document.getElementById('email').value);
           // formData.append('password', document.getElementById('password').value);
            formData.append('city_id', document.getElementById('city_id').value);
            formData.append('image', document.getElementById('image').files[0]);


            storeRoute('/cms/admin/admins-update/' +id , formData);

        }
    </script>

@endsection


{{--  Nabil  --}}
