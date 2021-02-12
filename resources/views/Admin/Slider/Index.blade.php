@extends('Layouts.Admin')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="x_panel tile">
                <div class="x_title">
                    <h2>{{ __('admin.sliders.title') }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if( Session::has('success') )
                        <div class="alert alert-success">
                        {{ Session::get('success') }}
                        </div>
                    @endif

                    <a class="btn btn-sm btn-success" href="{{ route('adminSliderCreate') }}">{{ __("admin.sliders.newCategoryImage") }}</a>
                    
                    <table class="table table-hover">
                        <tr>
                            <th>
                                {{ __('admin.sliders.table.id') }}
                            </th>
                            <th>
                                {{ __('admin.sliders.table.name') }}
                            </th>
                            <th>
                                {{ __('admin.sliders.table.position') }}
                            </th>
                            <th>
                                {{ __('admin.sliders.table.image') }}
                            </th>
                        </tr>
                        @foreach ($sliders as $slider)
                            <tr style="cursor:pointer;" onClick="document.location.href='{{ route('adminSliderEdit',$slider->id) }}';">
                                <td>
                                    {{ $slider->id }}
                                </td>
                                <td>
                                    {{ $slider->name }}
                                </td>
                                <td>
                                    {{ $slider->position }}
                                </td>
                                <td>
                                    <img src="/assets/images/sliders/{{ $slider->image }}" style="max-height:100px;">
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
