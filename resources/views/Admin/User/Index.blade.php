@extends('Layouts.Admin')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="x_panel tile">
                <div class="x_title">
                    <h2>Regisztrált felhasználók</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if( Session::has('success') )
                        <div class="alert alert-success">
                        {{ Session::get('success') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <tr>
                            <th>
                                @sortablelink("id", __('admin.users.table.id'))
                            </th>
                            <th>
                                @sortablelink("name", __('admin.users.table.name'))
                            </th>
                            <th>
                                @sortablelink("email", __('admin.users.table.email'))
                            </th>
                            <th>
                                @sortablelink("phone", __('admin.users.table.phone'))
                            </th>
                            <th>
                                @sortablelink("status.name", __('admin.users.table.status'))
                            </th>
                            <th>
                                @sortablelink("role.name", __('admin.users.table.role'))
                            </th>
                            <th>
                                @sortablelink("created_at", __('admin.users.table.created'))
                            </th>
                        </tr>
                        @foreach ($users as $user)
                            <tr style="cursor:pointer;" onClick="document.location.href='{{ route('adminUserEdit',$user->id) }}';">
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->phone }}
                                </td>
                                <td>
                                    {{ $user->status->name }}
                                </td>
                                <td>
                                    {{ $user->role->name }}
                                </td>
                                <td>
                                    {{ $user->created_at }}
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
