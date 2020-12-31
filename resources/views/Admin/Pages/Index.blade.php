@extends('Layouts.Admin')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="x_panel tile">
                <div class="x_title">
                    <h2>{{ __('admin.pages.title') }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if( Session::has('success') )
                        <div class="alert alert-success">
                        {{ Session::get('success') }}
                        </div>
                    @endif

                    <a class="btn btn-sm btn-success" href="{{ route('adminPageCreate') }}">{{ __("admin.pages.newPage") }}</a>
                    
                    <table class="table table-hover">
                        <tr>
                            <th>
                                {{ __('admin.pages.table.id') }}
                            </th>
                            <th>
                                {{ __('admin.pages.table.name') }}
                            </th>
                        </tr>
                        @foreach ($pages as $page)
                            <tr style="cursor:pointer;" onClick="document.location.href='{{ route('adminPageEdit',$page->id) }}';">
                                <td>
                                    {{ $page->id }}
                                </td>
                                <td>
                                    {{ $page->name }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
