@extends('cms.parent')

@section('title', 'Index Country')
@section('main-title', 'Index Country')
@section('sub-title', 'index country')


@section('styles')

@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{ route('countries.create') }}" class="btn btn-info">Add New Country</a>
                                <a href="{{ route('countries-trashed') }}" class="btn btn-danger">Trashed Countries</a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Name of Country</th>
                                        <th>Code</th>
                                        <th>City Number</th>
                                        <th style="width: 40px">Setting</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($countries as $country)
                                        <tr>
                                            <td>{{ $country->id }}</td>
                                            <td>{{ $country->name }}</td>
                                            <td>{{ $country->code }}</td>
                                            <td><span class="badge bg-info">{{ $country->cities_count }}</span></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a type="button" class="btn btn-info" href="{{ route('countries.edit', $country->id) }}">Edit</a>
                                                    <button type="button" onclick="performDestroy({{ $country->id }},this)" class="btn btn-danger">Delete</button>
                                                    <a type="button" class="btn btn-success" href="{{ route('countries.show',$country->id) }}">Show</a>
                                                </div>
                                            </td>

                                            {{--  <td><span class="badge bg-danger">55%</span></td>  --}}
                                        </tr>

                                        @empty
                                        <tr>
                                            <td colspan="4" style="text-align:center"> No Countries Defined </td>
                                        </tr>

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                            {{ $countries->links() }}
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')
<script>
     function performDestroy(id , referance){
        confirmDestroy('/cms/admin/countries/'+id , referance);
    }
</script>
@endsection
