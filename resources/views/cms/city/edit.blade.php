@extends('cms.parent')

@section('title', 'Edit City')
@section('main-title', 'Edit City')
@section('sub-title', 'edit city')


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
                            <h3 class="card-title">Add Data For City</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                          <div class="form-group">
                                            <label>Country Name</label>
                                            <select class="form-control select2 select2-danger" name="country_id" id="country_id" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                              {{--  <option selected="selected">Alabama</option>  --}}
                                                @foreach ($countries as $country)
    
                                                <option @if($country->id == $cities->country_id)
                                                    selected
                                                @endif value="{{ $country->id }}"> {{ $country->name }} </option>
    
                                                @endforeach
    
                                            </select>
                                          </div>
                                          <!-- /.form-group -->
                                        </div>
    
                                      </div>
    
                                    <label for="name">City Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $cities->name }}" placeholder="Enter Name of City">
                                </div>
                                <div class="form-group">
                                    <label for="street">street</label>
                                    <input type="text" class="form-control" id="street" name="street"
                                        value="{{ $cities->street }}" placeholder="Enter street of City">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button onclick="performUpdate({{ $cities->id }})" type="button"
                                    class="btn btn-primary">Update</button>

                                <a href="{{ route('cities.index') }}" class="btn btn-info">Cancel</a>
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

            formData.append('name', document.getElementById('name').value);
            formData.append('street' , document.getElementById('street').value);
            formData.append('country_id' , document.getElementById('country_id').value);

            storeRoute('/cms/admin/cities-update/' + id , formData);

        }
    </script>

@endsection




{{--  Nabil  --}}
