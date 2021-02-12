@extends('Layouts.Admin')

@section('content')
<div class="row">
  <div class="col-12 ">
        <h3>{{ __("admin.blogTag.title") }}</h3>

        @if( Session::has('success') )
          <div class="alert alert-success">
            {{ Session::get('success') }}
          </div>
        @endif

        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
            <ul>
              <li>{{ $error }}</li>
            </ul>
          </div>
        @endforeach

        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">
                  {{ __("admin.blogTag.table.id") }}
                </th>
                <th scope="col">
                  {{ __("admin.blogTag.table.name") }}
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr style="cursor: pointer" onClick="document.location.href='{{ route('adminBlogTagEdit',$tag->id) }}';">
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>

    </div>
  </div>
@endsection