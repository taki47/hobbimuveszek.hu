@extends('Layouts.Admin')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="x_panel tile">
                <div class="x_title">
                    <h2>{{ __('admin.users.title') }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if( Session::has('success') )
                        <div class="alert alert-success">
                        {{ Session::get('success') }}
                        </div>
                    @endif
                    
                    <form name="search" method="POST" action="{{ route('adminUserSearch') }}">
                        <input type="hidden" name="search" value="true">
                        @csrf
                        <h2>{{ __("admin.users.searchTitle") }}</h2>
                        <div class="row mb-2">
                          <div class="col-3">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('admin.users.search.nameFieldPlaceholder') }}" value="{{ isset($request['name']) ? $request['name'] : '' }}">
                          </div>
                          <div class="col-3">
                            <input type="text" name="email" class="form-control" placeholder="{{ __('admin.users.search.emailFieldPlaceholder') }}" value="{{ isset($request['email']) ? $request['email'] : '' }}">
                          </div>
                          <div class="col-3">
                            <select name="userStatusId" class="form-control">
                              <option value="" disabled selected>{{ __('admin.users.search.statusFieldPlaceholder') }}</option>  
                              <option value="-1">{{ __('admin.users.search.statusFieldAll') }}</option>
                              @foreach ($userStatuses as $userStatus)
                                  <option value="{{ $userStatus->id }}" {{ isset($request['userStatusId']) && $request["userStatusId"]==$userStatus->id ? "selected" : ""}}>{{ $userStatus->name }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-3">
                            <select name="userRoleId" class="form-control">
                              <option value="" disabled selected>{{ __('admin.users.search.roleFieldPlaceholder') }}</option>  
                              <option value="-1">{{ __('admin.users.search.roleFieldAll') }}</option>
                              @foreach ($userRoles as $userRole)
                                  <option value="{{ $userRole->id }}" {{ isset($request['userRoleId']) && $request["userRoleId"]==$userRole->id ? "selected" : ""}}>{{ $userRole->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col text-right">
                            <button type="submit" class="btn btn-success">{{ __('admin.users.search.submitButton') }}</button>
                            <button type="button" class="btn btn-primary" onClick='document.location.href="{{ route('adminUsers') }}"'>{{ __('admin.users.search.resetButton') }}</button>
                          </div>
                        </div>
                    </form>

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

                    {!! $users->appends(\Request::except('page'))->render("vendor.pagination.bootstrap-4") !!}
                </div>
            </div>
        </div>
    </div>
@endsection
