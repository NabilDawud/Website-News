@extends('cms.parent')

@section('title', 'Create Country')
@section('main-title', 'Create Country')
@section('sub-title', 'create country')


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
                            <h3 class="card-title">Add Data For country</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Country Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Name of Country">
                                </div>
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" id="code" name="code"
                                        placeholder="Enter Code of Country">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>

                                <a href="{{ route('countries.index') }}" class="btn btn-info">Cancel</a>
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
        function performStore(){

            let formData =new FormData();
            formData.append('name' , document.getElementById('name').value);
            formData.append('code' , document.getElementById('code').value);

            store('/cms/admin/countries' , formData);

        }

    </script>

@endsection


{{--  Nabil  --}}
