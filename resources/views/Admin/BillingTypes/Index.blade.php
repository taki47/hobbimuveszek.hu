@extends('Layouts.Admin')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="x_panel tile">
                <div class="x_title">
                    <h2>{{ __('admin.billingTypes.title') }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if( Session::has('success') )
                        <div class="alert alert-success">
                        {{ Session::get('success') }}
                        </div>
                    @endif

                    <a class="btn btn-sm btn-success" href="{{ route('adminBillingTypeCreate') }}">{{ __("admin.billingTypes.newBillingType") }}</a>
                    
                    <table class="table table-hover">
                        <tr>
                            <th>
                                {{ __('admin.billingTypes.table.id') }}
                            </th>
                            <th>
                                {{ __('admin.billingTypes.table.name') }}
                            </th>
                        </tr>
                        @foreach ($billingTypes as $billingType)
                            <tr style="cursor:pointer;" onClick="document.location.href='{{ route('adminBillingTypeEdit',$billingType->id) }}';">
                                <td>
                                    {{ $billingType->id }}
                                </td>
                                <td>
                                    {{ $billingType->name }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
