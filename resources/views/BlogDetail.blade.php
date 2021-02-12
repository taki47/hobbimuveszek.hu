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
                                @if ( $i==count($breadcumbs)-1 )
                                    <li class="breadcrumb-item active" aria-current="page">{{ $breadcumbs[$i]["name"] }}</li>
                                @else
                                    <li class="breadcrumb-item"><a href="{{ $breadcumbs[$i]["url"] }}">{{ $breadcumbs[$i]["name"] }}</a></li>
                                @endif
                            @endfor
                        </ol>
                    </nav>

                    <div class="row">
                        <div class="col-sm-12 col-md-9">
                            <div class="post-content">
                                <div class="row-custom">
                                    <h1 class="title">{{ $blog->name }}</h1>
                                </div>
                                <div class="row-custom">
                                    <div class="blog-post-meta">
                                        <a href="https://modesy.codingest.com/blog/fashion">
                                            <i class="icon-folder"></i>{{ $blog->getFirstTag($blog->id)->name }}</a>
                                            <span>
                                                <i class="icon-clock"></i>
                                                {{ $blog->created_at->diffForHumans() }}
                                            </span>
                                    </div>
                                </div>
                                <div class="row-custom">
                                    <div class="post-image">
                                        <img src="/blogs/{{ $blog->image }}"
                                            data-src="/blogs/{{ $blog->image }}"
                                            alt="{{ $blog->image_alt }}"
                                            title="{{ $blog->image_title }}"
                                            class="img-fluid lazyloaded">
                                    </div>
                                </div>
                                <div class="row-custom">
                                    <div class="post-text">
                                        {{ $blog->lead }}

                                        {!! $blog->content !!}
                                    </div>
                                </div>

                                <div class="row-custom">
                                    <div class="post-share">
                                        <h4 class="title">{{ __("blogPage.share") }}</h4>
                                        <a href="javascript:void(0)"
                                            onclick="window.open(&quot;https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}&quot;, &quot;Share This Post&quot;, &quot;width=640,height=450&quot;);return false"
                                            class="btn btn-md btn-share facebook">
                                            <i class="icon-facebook"></i>
                                            <span>Facebook</span>
                                        </a>

                                        <a href="javascript:void(0)"
                                            onclick="window.open(&quot;https://twitter.com/share?url={{ Request::url() }}&amp;text=Various versions have evolved over the years&quot;, &quot;Share This Post&quot;, &quot;width=640,height=450&quot;);return false"
                                            class="btn btn-md btn-share twitter">
                                            <i class="icon-twitter"></i>
                                            <span>Twitter</span>
                                        </a>

                                        <a href="https://api.whatsapp.com/send?text={{ $blog->name }} - {{ Request::url() }}"
                                            target="_blank" class="btn btn-md btn-share whatsapp">
                                            <i class="icon-whatsapp"></i>
                                            <span>Whatsapp</span>
                                        </a>

                                        <a href="javascript:void(0)"
                                            onclick="window.open(&quot;http://pinterest.com/pin/create/button/?url={{ Request::url() }}&amp;media={{ env("APP_URL") }}/blogs/{{ $blog->image }}&quot;, &quot; Share This Post&quot;, &quot;width=640,height=450&quot;);return false"
                                            class="btn btn-md btn-share pinterest">
                                            <i class="icon-pinterest"></i>
                                            <span>Pinterest</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-3">
                            <div class="latest-posts">
                                <h4 class="blog-section-title">{{ __("blogPage.latestBlogs") }}</h4>
                                <div class="row">
                                    <!--print related posts-->
                                    @foreach ($latestBlogs as $latestBlog)
                                        @php
                                            $tag = $latestBlog->getFirstTag($latestBlog->id);
                                        @endphp
                                        <div class="col-sm-12">
                                            <div class="blog-item blog-item-small">
                                                <div class="blog-item-img">
                                                    <a href="{{ route("blogDetail", [$tag->url, $latestBlog->url]) }}" class="text-center">
                                                        <img src="/blogs/{{ $latestBlog->image }}"
                                                            data-src="/blogs/{{ $latestBlog->image }}"
                                                            alt="{{ $latestBlog->image_alt }}"
                                                            title="{{ $latestBlog->image_title }}"
                                                            class="img-fluid ls-is-cached lazyloaded"
                                                            style="max-height:180px;">
                                                    </a>
                                                </div>
                                                <h3 class="blog-post-title">
                                                    <a href="{{ route("blogDetail", [$tag->url, $latestBlog->url]) }}">
                                                        {{ $latestBlog->name }}
                                                    </a>
                                                </h3>
                                                <div class="blog-post-meta">
                                                    <span>
                                                        <i class="icon-clock"></i>
                                                        {{ $blog->created_at->diffForHumans() }}
                                                    </span>
                                                    <a href="{{ route("blogTagFilter", $tag->url) }}">
                                                        <i class="icon-folder"></i>
                                                        {{ $tag->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="blog-tags">
                                <h4 class="blog-section-title">{{ __("blogPage.tags") }}</h4>
                                <ul>
                                    <!--print tags-->
                                    @foreach ($tags as $tag)
                                        <li>
                                            <a href="{{ route("blogTagFilter", $tag->url) }}">{{ $tag->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
