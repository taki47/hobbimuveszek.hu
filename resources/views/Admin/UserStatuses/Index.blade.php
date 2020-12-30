@extends('Layouts.Admin')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="x_panel tile">
                <div class="x_title">
                    <h2>{{ __('admin.userStatuses.title') }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if( Session::has('success') )
                        <div class="alert alert-success">
                        {{ Session::get('success') }}
                        </div>
                    @endif

                    <a class="btn btn-sm btn-success" href="{{ route('adminUserStatusCreate') }}">{{ __("admin.userStatuses.newRole") }}</a>
                    
                    <table class="table table-hover">
                        <tr>
                            <th>
                                {{ __('admin.userStatuses.table.id') }}
                            </th>
                            <th>
                                {{ __('admin.userStatuses.table.name') }}
                            </th>
                        </tr>
                        @foreach ($statuses as $status)
                            <tr style="cursor:pointer;" onClick="document.location.href='{{ route('adminUserStatusEdit',$status->id) }}';">
                                <td>
                                    {{ $status->id }}
                                </td>
                                <td>
                                    {{ $status->name }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
