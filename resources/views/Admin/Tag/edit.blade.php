@extends('Layouts.Admin')

@section('content')
<div class="row">
	<div class="col-12 ">
        
      <h4>{{ __("admin.blogTag.edit.title") }}</h4>
      <br />
      <form method="post" action="{{ route('adminBlogTagUpdate', $tag->id) }}">
		@csrf

		<div class="jumbotron">
			<div class="container">
				@foreach($errors->all() as $error)
					<div class="alert alert-danger">
						<ul>
							<li>{{ $error }}</li>
						</ul>
					</div>
				@endforeach

				@if( Session::has('success') )
					<div class="alert alert-success">
						{{ Session::get('success') }}
					</div>
				@endif
				
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label>* {{ __("admin.blogTag.edit.nameFieldLabel") }}</label>
							<input type="text" class="form-control" placeholder="{{ __("admin.blogTag.edit.nameFieldPlaceholder") }}" value="{{ $tag && old("name")=="" ? $tag->name : old("name") }}" required name="name">
						</div>
					</div>
					
					<div class="col-12">
						<div class="form-group">
							<label>{{ __("admin.blogTag.edit.blogs") }}</label>
							<div class="tags-list">
								@foreach ($blogs as $blog)
									<input name="blogs[]" {{ in_array($blog->id,$blog_tags) ? "checked" : "" }}  type="checkbox" value="{{ $blog->id }}"> {{ $blog->name }}<br>
								@endforeach
							</div>
						</div>
					</div>

					<div class="col-12">
						<div class="single-input-item">
							<button class="btn btn-success">{{ __("admin.blogTag.edit.submitButton") }}</button>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">{{ __("admin.blogTag.edit.deleteButton") }}</button>
						</div>
					</div>
				</div>
			</div>
		</div>
      </form>

    </div>
</div>
	
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<div class="col-xs-6">
					<h5 class="modal-title">{{ __("admin.blogTag.edit.deleteTitle") }}</h5>
				</div>
				<div class="col-xs-6">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
				</div>
			</div>
			<div class="modal-body">
				{{ __("admin.blogTag.edit.deleteConfirm") }}

				<form id="deleteBlog" method="POST" action="{{ route('adminBlogTagDestroy', $tag->id) }}">
					@csrf
					@method("DELETE")
					
					<button class="btn btn-danger">{{ __("admin.blogTag.edit.deleteButton") }}</button>
			  		<button type="button" class="btn btn-success" data-dismiss="modal">{{ __("admin.blogTag.edit.deleteCancel") }}</button>
				</form>
			</div>
		  </div>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="/admin/assets/js/newTag.js"></script>
	<script src="/admin/assets/js/adminTags.js"></script>
@endsection