@extends('Layouts.Admin')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="x_panel tile">
                <div class="x_title">
                    <h2>{{ __('admin.topcategories.title') }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if( Session::has('success') )
                        <div class="alert alert-success">
                        {{ Session::get('success') }}
                        </div>
                    @endif

                    <a class="btn btn-sm btn-success" href="{{ route('adminTopCategoryCreate') }}">{{ __("admin.topcategories.newCategoryImage") }}</a>
                    
                    <table class="table table-hover">
                        <tr>
                            <th>
                                {{ __('admin.topcategories.table.id') }}
                            </th>
                            <th>
                                {{ __('admin.topcategories.table.name') }}
                            </th>
                            <th>
                                {{ __('admin.topcategories.table.position') }}
                            </th>
                            <th>
                                {{ __('admin.topcategories.table.link') }}
                            </th>
                            <th>
                                {{ __('admin.topcategories.table.image') }}
                            </th>
                        </tr>
                        @foreach ($topCategories as $topCategory)
                            <tr style="cursor:pointer;" onClick="document.location.href='{{ route('adminTopCategoryEdit',$topCategory->id) }}';">
                                <td>
                                    {{ $topCategory->id }}
                                </td>
                                <td>
                                    {{ $topCategory->name }}
                                </td>
                                <td>
                                    {{ $topCategory->position }}
                                </td>
                                <td>
                                    {{ $topCategory->link }}
                                </td>
                                <td>
                                    <img src="/assets/images/topcategories/{{ $topCategory->image }}" style="max-height:100px;">
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
