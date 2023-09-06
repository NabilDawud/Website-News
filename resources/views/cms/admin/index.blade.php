@extends('cms.parent')

@section('title', 'Index Admin')
@section('main-title', 'Index Admin')
@section('sub-title', 'index admin')


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
                                <a href="{{ route('admins.create') }}" class="btn btn-info">Add New Admin</a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Image</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th style="text-align: center">Gender</th>
                                        <th>Status</th>
                                        <th>Mobile</th>
                                        <th>City</th>

                                        <th style="width: 40px">Setting</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($admins as $admin)
                                        <tr>
                                            <td>{{ $admin->id }}</td>
                                            <td style=" text-align: center"><img class="img-circle img-bordered-sm" src="{{ asset('storage/images/admin/'. $admin->user->image) }}" width="50px" height="50px" alt="User Image"></td>
                                            <td>{{ $admin->user->first_name ?? '' }}</td>
                                            <td>{{ $admin->user->last_name ?? '' }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>

                                                @if ($admin->user)
                                                    @if ($admin->user->gender == 'Male')
                                                        <span class="badge bg-info">{{ $admin->user->gender ?? '' }}
                                                        @else <span class="badge bg-danger">{{ $admin->user->gender ?? '' }}
                                                    @endif
                                                    @else null
                                                @endif
                                            </td>
                                            <td>

                                                @if ($admin->user)
                                                    @if ($admin->user->status == 'Active')
                                                        <span class="badge bg-info">{{ $admin->user->status ?? '' }}
                                                        @else <span class="badge bg-danger">{{ $admin->user->status ?? '' }}
                                                    @endif
                                                    @else null
                                                @endif
                                            </td>

                                            <td>{{ $admin->user->mobile ?? '' }}</td>
                                            <td><span class="badge bg-info">{{ $admin->user->city->name ?? '' }}</span>
                                            </td>
                                            <td>

                                                <div class="btn-group">
                                                    <a type="button" class="btn btn-info"
                                                        href="{{ route('admins.edit', $admin->id) }}">Edit</a>
                                                    <button type="button"
                                                        onclick="performDestroy({{ $admin->id }},this)"
                                                        class="btn btn-danger">Delete</button>
                                                    {{--  <a type="button" class="btn btn-success" href="{{ route('admins.show',$Admin->id) }}">Show</a>  --}}
                                                </div>
                                            </td>

                                            {{--  <td><span class="badge bg-danger">55%</span></td>  --}}
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="8" style="text-align:center"> No admins Defined </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        {{ $admins->links() }}
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
        function performDestroy(id, referance) {
            confirmDestroy('/cms/admin/admins/' + id, referance);
        }
    </script>
@endsection
