@extends('Layouts.Admin')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="x_panel tile">
                <div class="x_title">
                    <h2>{{ __('admin.globalSettings.title') }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if( Session::has('success') )
                        <div class="alert alert-success">
                        {{ Session::get('success') }}
                        </div>
                    @endif

                    <a class="btn btn-sm btn-success" href="{{ route('adminGlobalSettingCreate') }}">{{ __("admin.globalSettings.newGlobalSetting") }}</a>
                    
                    <table class="table table-hover">
                        <tr>
                            <th>
                                {{ __('admin.globalSettings.table.id') }}
                            </th>
                            <th>
                                {{ __('admin.globalSettings.table.name') }}
                            </th>
                        </tr>
                        @foreach ($globalSettings as $globalSetting)
                            <tr style="cursor:pointer;" onClick="document.location.href='{{ route('adminGlobalSettingEdit',$globalSetting->id) }}';">
                                <td>
                                    {{ $globalSetting->id }}
                                </td>
                                <td>
                                    {{ $globalSetting->name }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
