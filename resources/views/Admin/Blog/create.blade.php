@extends('Layouts.Admin')

@section('content')
<div class="row">
	<div class="col-12 ">
        
      <h4>{{ __("admin.blog.create.title") }}</h4>
      <br />
      <form method="post" enctype="multipart/form-data" action="{{ route('adminBlogStore') }}">
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
							<label>* {{ __("admin.blog.create.nameFieldLabel") }}</label>
							<input type="text" class="form-control" value="{{ old("name") }}" required name="name" placeholder="{{ __("admin.blog.create.nameFieldPlaceholder") }}">
						</div>
					</div>

					<div class="col-md-4 col-12">
						<div class="form-group">
						<label>* {{ __("admin.blog.create.imageFieldLabel") }}</label>
						<input type="file" class="form-control" name="image" required>
						</div>
					</div>

					<div class="col-md-4 col-12">
						<div class="form-group">
						<label>* {{ __("admin.blog.create.imageTitleFieldLabel") }}</label>
						<input type="text" class="form-control" name="image_title" required value="{{ old("image_title") }}" placeholder="{{ __("admin.blog.create.imageAltFieldPlaceholder") }}">
						</div>
					</div>

					<div class="col-md-4 col-12">
						<div class="form-group">
						<label>* {{ __("admin.blog.create.imageAltFieldLabel") }}</label>
						<input type="text" class="form-control" name="image_alt" required value="{{ old("image_alt") }}" placeholder="{{ __("admin.blog.create.imageAltFieldPlaceholder") }}">
						</div>
					</div>

					<div class="col-md-6 col-12">
						<div class="form-group">
							<label>* {{ __("admin.blog.create.metaKeywordsLabel") }}</label>
							<input type="text" class="form-control" value="{{ old("meta_keywords") }}" required name="meta_keywords" placeholder="{{ __("admin.blog.create.metaKeywordsPlaceholder") }}">
						</div>
					</div>

					<div class="col-md-6 col-12">
						<div class="form-group">
							<label>* {{ __("admin.blog.create.metaDescriptionLabel") }}</label>
							<input type="text" class="form-control" value="{{ old("meta_descriptions") }}" required name="meta_descriptions" placeholder="{{ __("admin.blog.create.metaDescriptionPlaceholder") }}">
						</div>
					</div>

					<div class="col-12">
						<div class="form-group">
							<label>* {{ __("admin.blog.create.leadFieldLabel") }}</label>
							<textarea class="form-control" required name="lead" rows="6">{{ old("lead") }}</textarea>
						</div>
					</div>

					<div class="col-12">
						<div class="form-group">
							<label>* {{ __("admin.blog.create.bodyFieldLabel") }}</label>
							<textarea class="form-control" required name="content" id="content">{{ old("content") }}</textarea>
						</div>
					</div>

					<div class="col-12">
						<div class="form-group">
							<label>{{ __("admin.blog.create.tagsTitle") }}</label>
							<div class="tags-list">
								@foreach ($tags as $tag)
									<input name="tags[]" type="checkbox" {{ old("tags") && in_array($tag->id,old("tags")) ? "checked" : "" }} value="{{ $tag->id }}"> {{ $tag->name }}<br>
								@endforeach
							</div>
							<a href="#" data-toggle="modal" data-target="#newTagModal">
								{{ __("admin.blog.create.newTag") }}
							</a>
						</div>
						
					</div>

					<div class="col-12">
						<div class="single-input-item">
							<button class="btn btn-success">{{ __("admin.blog.create.submitButton") }}</button>
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
					<h5 class="modal-title">{{ __("admin.blog.create.newTagTitle") }}</h5>
				</div>
				<div class="col-xs-6">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
				</div>
			</div>
			<div class="modal-body">
				<label>* {{ __("admin.blog.create.tagNameFieldLabel") }}</label>
				<input type="text" class="form-control" placeholder="{{ __("admin.blog.create.tagNameFieldPlaceholder") }}" value="{{ old("name") }}" required id="tagName">
			</div>
			<div class="modal-footer">
			  <button type="submit" class="btn btn-primary" onClick="saveNewTag('{{ Auth::user()->api_token }}');">{{ __("admin.blog.create.newTagSave") }}</button>
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("admin.blog.create.newTagCancel") }}</button>
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
			filebrowserUploadUrl: '/ckfinder/connector',
        });
    </script>
@endsection