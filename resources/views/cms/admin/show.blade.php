

@extends('cms.parent')

@section('title','Show Country')
@section('main-title','Show Country')
@section('sub-title','show country')


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
                  <input type="text" class="form-control" id="name" name="name" value="{{ $countries->name }}" placeholder="Enter Name of Country" disabled>
                </div>
                <div class="form-group">
                  <label for="code">Code</label>
                  <input type="text" class="form-control" id="code" name="code" value="{{ $countries->code }}" placeholder="Enter Code of Country" disabled>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
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

@endsection




{{--  Nabil  --}}
