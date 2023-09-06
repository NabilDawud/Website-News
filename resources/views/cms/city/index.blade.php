@extends('cms.parent')

@section('title', 'Index City')
@section('main-title', 'Index City')
@section('sub-title', 'index city')


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
                                <a href="{{ route('cities.create') }}" class="btn btn-info">Add New City</a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Name of City</th>
                                        <th>street</th>
                                        <th>Country Name</th>
                                        <th style="width: 40px">Setting</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($cities as $City)
                                        <tr>
                                            <td>{{ $City->id }}</td>
                                            <td>{{ $City->name }}</td>
                                            <td>{{ $City->street }}</td>
                                            <td><span class="badge bg-info">{{ $City->country->name }}</span></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a type="button" class="btn btn-info" href="{{ route('cities.edit', $City->id) }}">Edit</a>
                                                    <button type="button" onclick="performDestroy({{ $City->id }},this)" class="btn btn-danger">Delete</button>
                                                    {{--  <a type="button" class="btn btn-success" href="{{ route('cities.show',$City->id) }}">Show</a>  --}}
                                                </div>
                                            </td>

                                            {{--  <td><span class="badge bg-danger">55%</span></td>  --}}
                                        </tr>

                                        @empty
                                        <tr>
                                            <td colspan="5" style="text-align:center"> No cities Defined </td>
                                        </tr>

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                            {{ $cities->links() }}
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
        confirmDestroy('/cms/admin/cities/'+id , referance);
    }
</script>
@endsection
