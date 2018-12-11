@extends('admin.layout')

@section('scripts')
<script src="{{ mix_asset('js/admin/pages/users.js') }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <div class="tile-title-w-btn">
            <h3 class="title-5 m-b-35">Users</h3>
            <p><a class="btn btn-primary icon-btn" href="#"><i class="fa fa-file"></i>New User</a></p>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>
                            <label class="au-checkbox">
                                <input type="checkbox" class="js-check-all-users">
                                <span class="au-checkmark"></span>
                            </label>
                        </th>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Created Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="tr-shsadow">
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox" class="js-check-user">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>{{ $user->getKey() }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at ? $user->created_at->toDateTimeString() : '' }}</td>
                        <td>
                            <div class="table-data-feature">
                                <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fas fa-edit text-white"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="px-0" colspan="6">{{ $users->links() }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
@endsection