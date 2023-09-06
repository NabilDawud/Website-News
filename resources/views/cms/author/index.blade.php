@extends('cms.parent')

@section('title', 'Index Author')
@section('main-title', 'Index Author')
@section('sub-title', 'index author')


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
                                <a href="{{ route('authors.create') }}" class="btn btn-info">Add New Author</a>
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
                                    @forelse($authors as $author)
                                        <tr>
                                            <td>{{ $author->id }}</td>
                                            <td style=" text-align: center"><img class="img-circle img-bordered-sm" src="{{ asset('storage/images/author/'. $author->user->image) }}" width="50px" height="50px" alt="User Image"></td>
                                            <td>{{ $author->user->first_name ?? '' }}</td>
                                            <td>{{ $author->user->last_name ?? '' }}</td>
                                            <td>{{ $author->email }}</td>
                                            <td>

                                                @if ($author->user)
                                                    @if ($author->user->gender == 'Male')
                                                        <span class="badge bg-info">{{ $author->user->gender ?? '' }}
                                                        @else <span class="badge bg-danger">{{ $author->user->gender ?? '' }}
                                                    @endif
                                                    @else null
                                                @endif
                                            </td>
                                            <td>

                                                @if ($author->user)
                                                    @if ($author->user->status == 'Active')
                                                        <span class="badge bg-info">{{ $author->user->status ?? '' }}
                                                        @else <span class="badge bg-danger">{{ $author->user->status ?? '' }}
                                                    @endif
                                                    @else null
                                                @endif
                                            </td>

                                            <td>{{ $author->user->mobile ?? '' }}</td>
                                            <td><span class="badge bg-info">{{ $author->user->city->name ?? '' }}</span>
                                            </td>
                                            <td>

                                                <div class="btn-group">
                                                    <a type="button" class="btn btn-info"
                                                        href="{{ route('authors.edit', $author->id) }}">Edit</a>
                                                    <button type="button"
                                                        onclick="performDestroy({{ $author->id }},this)"
                                                        class="btn btn-danger">Delete</button>
                                                    {{--  <a type="button" class="btn btn-success" href="{{ route('authors.show',$author->id) }}">Show</a>  --}}
                                                </div>
                                            </td>

                                            {{--  <td><span class="badge bg-danger">55%</span></td>  --}}
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="8" style="text-align:center"> No authors Defined </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        {{ $authors->links() }}
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
            confirmDestroy('/cms/admin/authors/' + id, referance);
        }
    </script>
@endsection
