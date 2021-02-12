@extends('Layouts.Admin')

@section('content')
<div class="row">
	<div class="col-12 ">
        
      <h4>{{ __("admin.blog.edit.title") }}</h4>
      <br />
      <form method="post" enctype="multipart/form-data" action="{{ route('adminBlogUpdate', $blog->id) }}">
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
				
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label>* {{ __("admin.blog.edit.nameFieldLabel") }}</label>
							<input type="text" class="form-control" placeholder="{{ __("admin.blog.edit.nameFieldPlaceholder") }}" value="{{ $blog && old("name")=="" ? $blog->name : old("name") }}" required name="name">
						</div>
					</div>

					<div class="col-md-4 col-12">
						<div class="form-group">
						<label>{{ __("admin.blog.edit.imageFieldLabel") }}</label>
						<input type="file" class="form-control" name="image"><br>
						<img src="/blogs/{{ $blog->image }}" style="max-height:100px;">
						</div>
					</div>

					<div class="col-md-4 col-12">
						<div class="form-group">
						<label>* {{ __("admin.blog.edit.imageTitleFieldLabel") }}</label>
						<input type="text" class="form-control" required name="image_title" value="{{ $blog->image_title && old("image_title")=="" ? $blog->image_title : old("image_title") }}">
						</div>
					</div>

					<div class="col-md-4 col-12">
						<div class="form-group">
						<label>* {{ __("admin.blog.edit.imageAltFieldLabel") }}</label>
						<input type="text" class="form-control" required name="image_alt" value="{{ $blog->image_alt && old("image_alt")=="" ? $blog->image_alt : old("image_alt") }}">
						</div>
					</div>

					<div class="col-md-6 col-12">
						<div class="form-group">
							<label>* {{ __("admin.blog.edit.metaKeywordsFieldLabel") }}</label>
							<input type="text" class="form-control" placeholder="{{ __("admin.blog.edit.metaKeywordsFieldPlaceholder") }}" value="{{ $blog->meta_keywords && old("meta_keywords")=="" ? $blog->meta_keywords : old("meta_keywords") }}" required name="meta_keywords">
						</div>
					</div>

					<div class="col-md-6 col-12">
						<div class="form-group">
							<label>* {{ __("admin.blog.edit.metaDescriptionFieldLabel") }}</label>
							<input type="text" class="form-control" placeholder="{{ __("admin.blog.edit.metaDescriptionFieldLabel") }}" value="{{ $blog->meta_descriptions && old("meta_descriptions")=="" ? $blog->meta_descriptions : old("meta_descriptions") }}" required name="meta_descriptions">
						</div>
					</div>

					<div class="col-12">
						<div class="form-group">
							<label>* {{ __("admin.blog.edit.leadFieldLabel") }}</label>
							<textarea class="form-control" placeholder="{{ __("admin.blog.edit.leadFieldPlaceholder") }}" required name="lead" rows="6">{{ $blog->lead && old("lead")=="" ? $blog->lead : old("lead") }}</textarea>
						</div>
					</div>

					<div class="col-12">
						<div class="form-group">
							<label>* {{ __("admin.blog.edit.bodyFieldLabel") }}</label>
							<textarea class="form-control" placeholder="{{ __("admin.blog.edit.bodyFieldPlaceholder") }}" required name="content" id="content">{{ $blog->content && old("content")=="" ? $blog->content : old("content") }}</textarea>
						</div>
					</div>

					<div class="col-12">
						<div class="form-group">
							<label>{{ __("admin.blog.edit.tagsTitle") }}</label>
							<div class="tags-list">
								@foreach ($tags as $tag)
									<input name="tags[]" type="checkbox" {{ in_array($tag->id,$blog_tags) ? "checked" : "" }} value="{{ $tag->id }}"> {{ $tag->name }}<br>
								@endforeach
							</div>
							<a href="#" data-toggle="modal" data-target="#newTagModal">
								{{ __("admin.blog.edit.newTag") }}
							</a>
						</div>
					</div>

					<div class="col-12">
						<div class="single-input-item">
							<button class="btn btn-success">{{ __("admin.blog.edit.submitButton") }}</button>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">{{ __("admin.blog.edit.deleteButton") }}</button>
						</div>
					</div>
				</div>
			</div>
		</div>
      </form>

	</div>
</div>
	

	<div class="modal fade" id="newTagModal" tabindex="-1" role="dialog" aria-labelledby="newTagModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<div class="col-xs-6">
					<h5 class="modal-title">{{ __("admin.blog.edit.newTagTitle") }}</h5>
				</div>
				<div class="col-xs-6">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
				</div>
			</div>
			<div class="modal-body">
				<label>* {{ __("admin.blog.edit.tagNameFieldLabel") }}</label>
				<input type="text" class="form-control" placeholder="{{ __("admin.blog.edit.tagNameFieldPlaceholder") }}" value="{{ old("name") }}" required id="tagName">
			</div>
			<div class="modal-footer">
			  <button type="submit" class="btn btn-primary" onClick="saveNewTag('{{ Auth::user()->api_token }}');">{{ __("admin.blog.edit.newTagSave") }}</button>
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("admin.blog.edit.newTagCancel") }}</button>
			</div>
		  </div>
		</div>
	</div>

	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<div class="col-xs-6">
					<h5 class="modal-title">{{ __("admin.blog.edit.deleteTitle") }}</h5>
				</div>
				<div class="col-xs-6">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
				</div>
			</div>
			<div class="modal-body">
				{{ __("admin.blog.edit.deleteConfirm") }}

				<form id="deleteBlog" method="POST" action="{{ route('adminBlogDestroy', $blog->id) }}">
					@csrf
					@method("DELETE")
					
					<button class="btn btn-danger">{{ __("admin.blog.edit.deleteButton") }}</button>
			  		<button type="button" class="btn btn-success" data-dismiss="modal">{{ __("admin.blog.edit.deleteCancel") }}</button>
				</form>
			</div>
		  </div>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="/admin/assets/js/newTag.js"></script>
	
	<script src="/admin/assets/ckeditor/ckeditor.js"></script>
    <script src="/admin/assets/ckeditor/adapters/jquery.js"></script>

    <script>
        CKEDITOR.replace('content', {
            height: '800px',
            filebrowserBrowseUrl: '/ckfinder/browser',
	        filebrowserUploadUrl: '/ckfinder/connector'
        });
    </script>
@endsection