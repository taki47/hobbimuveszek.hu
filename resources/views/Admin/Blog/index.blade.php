@extends('Layouts.Admin')

@section('content')
<div class="row">
  <div class="col-12 ">
        <h3>{{ __("admin.blog.title") }}</h3>
        @if( Session::has('success') !== false )
					<div class="alert alert-success">
						{{ Session::get('success') }}
					</div>
        @endif
        
        <a href="{{ route('adminBlogCreate') }}" class="btn btn-success">{{ __("admin.blog.newBlog") }}</a>

        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">
                  @sortablelink('id', __("admin.blog.table.id"))
                </th>
                <th scope="col">
                  @sortablelink('name', __("admin.blog.table.name"))
                </th>
                <th scope="col">
                  @sortablelink('created_at', __("admin.blog.table.created_at"))
                </th>
                <th scope="col">
                  @sortablelink('updated_at', __("admin.blog.table.updated_at"))
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr style="cursor:pointer;" onClick="document.location.href='{{ route('adminBlogEdit',$blog->id) }}';">
                        <th scope="row">{{ $blog->id }}</th>
                        <td>{{ $blog->name }}</td>
                        <td>{{ $blog->created_at }}</td>
                        <td>{{ $blog->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>

          {!! $blogs->appends(\Request::except('page'))->render("vendor/pagination/bootstrap-4") !!}

  </div>
</div>
@endsection