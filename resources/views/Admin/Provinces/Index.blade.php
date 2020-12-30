@extends('Layouts.Admin')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="x_panel tile">
                <div class="x_title">
                    <h2>{{ __('admin.provinces.title') }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if( Session::has('success') )
                        <div class="alert alert-success">
                        {{ Session::get('success') }}
                        </div>
                    @endif

                    <a class="btn btn-sm btn-success" href="{{ route('adminProvinceCreate') }}">{{ __("admin.provinces.newProvince") }}</a>
                    
                    <table class="table table-hover">
                        <tr>
                            <th>
                                {{ __('admin.provinces.table.id') }}
                            </th>
                            <th>
                                {{ __('admin.provinces.table.name') }}
                            </th>
                        </tr>
                        @foreach ($provinces as $province)
                            <tr style="cursor:pointer;" onClick="document.location.href='{{ route('adminProvinceEdit',$province->id) }}';">
                                <td>
                                    {{ $province->id }}
                                </td>
                                <td>
                                    {{ $province->name }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
