@extends('Layouts.Admin')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="x_panel tile">
                <div class="x_title">
                    <h2>{{ __('admin.categoryImages.title') }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if( Session::has('success') )
                        <div class="alert alert-success">
                        {{ Session::get('success') }}
                        </div>
                    @endif

                    <a class="btn btn-sm btn-success" href="{{ route('adminCategoryImageCreate') }}">{{ __("admin.categoryImages.newCategoryImage") }}</a>
                    
                    <table class="table table-hover">
                        <tr>
                            <th>
                                {{ __('admin.categoryImages.table.id') }}
                            </th>
                            <th>
                                {{ __('admin.categoryImages.table.name') }}
                            </th>
                            <th>
                                {{ __('admin.categoryImages.table.categoryName') }}
                            </th>
                            <th>
                                {{ __('admin.categoryImages.table.image') }}
                            </th>
                        </tr>
                        @foreach ($categoryImages as $categoryImage)
                            <tr style="cursor:pointer;" onClick="document.location.href='{{ route('adminCategoryImageEdit',$categoryImage->id) }}';">
                                <td>
                                    {{ $categoryImage->id }}
                                </td>
                                <td>
                                    {{ $categoryImage->name }}
                                </td>
                                <td>
                                    {{ $categoryImage->category->name }}
                                </td>
                                <td>
                                    <img src="/assets/images/categoryImages/{{ $categoryImage->image }}">
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
