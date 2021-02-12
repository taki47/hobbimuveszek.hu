@extends('Layouts.Master')

@section('content')
<div id="wrapper">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="blog-content">
                    <nav class="nav-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @for ($i = 0; $i < count($breadcumbs); $i++)
                                <li class="breadcrumb-item"><a href="{{ $breadcumbs[$i]["url"] }}">{{ $breadcumbs[$i]["name"] }}</a></li>
                            @endfor
                        </ol>
                    </nav>

                    <h1 class="page-title">Blog</h1>

                    <div class="row">
                        <div class="col-12">
                            <ul class="blog-categories">
                                <li class="{{ $currentTag=="" ? "active" : "" }}">
                                    <a href="{{ route("blog") }}">Mind</a>
                                </li>
                                @foreach ($tags as $tag)
                                    <li class="{{ $currentTag==$tag->name ? "active" : "" }}">
                                        <a href="{{ route("blogTagFilter",$tag->url) }}">{{ $tag->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <!--print blog posts-->
                        @foreach ($blogs as $blog)
                            @php
                                $blogTag = $blog->getFirstTag($blog->id);
                            @endphp
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                <div class="blog-item">
                                    <div class="blog-item-img">
                                        <a href="{{ route("blogDetail", [$blogTag->url, $blog->url]) }}" class="text-center">
                                            <img src="/blogs/{{ $blog->image }}"
                                                data-src="/blogs/{{ $blog->image }}"
                                                alt="{{ $blog->image_alt }}"
                                                title="{{ $blog->image_title }}"
                                                class="img-fluid ls-is-cached lazyloaded"
                                                style="height:265px;">
                                        </a>
                                    </div>
                                    <h3 class="blog-post-title text-center">
                                        <a href="{{ route("blogDetail", [$blogTag->url, $blog->url]) }}">
                                            {{ $blog->name }}
                                        </a>
                                    </h3>
                                    <div class="blog-post-meta text-center">
                                        <a href="{{ route("blogTagFilter", $blogTag->url) }}">
                                            <i class="icon-folder"></i>
                                            @if ( $currentTag )
                                                {{ $currentTag }}
                                            @else
                                                {{ $blogTag->name }}
                                            @endif
                                        </a>
                                        <span>
                                            <i class="icon-clock"></i>
                                            {{ $blog->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <div class="blog-post-description text-center">
                                        @if ( strlen($blog->lead)>100 )
                                            {{ substr($blog->lead,0,100) }}...
                                        @else
                                            {{ $blog->lead }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <!-- Pagination -->
                        <div class="col-sm-12">
                            {{ $blogs->links("vendor/pagination/bootstrap-4") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
