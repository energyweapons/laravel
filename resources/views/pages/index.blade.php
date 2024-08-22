@extends('layouts.main')

@section('title', 'หน้าแรก')

@section('content')
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                ข่าวด่วนวันนี้
            </h3>
            @foreach ($articles as $article)
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-
    250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong>
                        <h3 class="mb-0">{{ Str::limit($article->title, 45, '...') }}</h3>
                        <div class="mb-1 text-body-secondary">
                            {{ $article->published_at->locale('th')->translatedFormat('d M y') }}</div>
                        <p class="card-text mb-auto">{{ Str::limit($article->body, 240) }}</p>
                        <a href="{{ route('news', ['id' => $article->id]) }}"
                            class="icon-link gap-1 icon-link-hover stretched-link">
                            อ่านต่อ
                            <svg class="bi">
                                <use xlink:href="#chevron-right" />
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                            focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em">Thumbnail</text>
                        </svg>
                    </div>
                </div>
            @endforeach
            {{ $articles->links() }}
        </div>
        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-body-tertiary rounded">
                    <h4 class="fst-italic">About</h4>
                    <p class="mb-0">Customize this section to tell your visitors a little bit about
                        your publication,
                        writers, content, or something else entirely. Totally up to you.</p>
                </div>
                <div>
                    <h4 class="fst-italic">Recent posts</h4>
                    <ul class="list-unstyled">
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start alignitems-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="#">
                                <svg class="bd-placeholder-img" width="100%" height="96"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <rect width="100%" height="100%" fill="#777" />
                                </svg>
                                <div class="col-lg-8">
                                    <h6 class="mb-0">Example blog post title</h6>
                                    <small class="text-body-secondary">January 15, 2024</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start alignitems-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="#">
                                <svg class="bd-placeholder-img" width="100%" height="96"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <rect width="100%" height="100%" fill="#777" />
                                </svg>
                                <div class="col-lg-8">
                                    <h6 class="mb-0">This is another blog post title</h6>
                                    <small class="text-body-secondary">January 14, 2024</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start alignitems-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="#">
                                <svg class="bd-placeholder-img" width="100%" height="96"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <rect width="100%" height="100%" fill="#777" />
                                </svg>
                                <div class="col-lg-8">
                                    <h6 class="mb-0">Longer blog post title: This one has multiple
                                        lines!</h6>
                                    <small class="text-body-secondary">January 13, 2024</small>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="p-4">
                    <h4 class="fst-italic">Archives</h4>
                    <ol class="list-unstyled mb-0">
                        <li><a href="#">March 2021</a></li>
                        <li><a href="#">February 2021</a></li>
                        <li><a href="#">January 2021</a></li>
                        <li><a href="#">December 2020</a></li>
                        <li><a href="#">November 2020</a></li>
                        <li><a href="#">October 2020</a></li>
                        <li><a href="#">September 2020</a></li>
                        <li><a href="#">August 2020</a></li>
                        <li><a href="#">July 2020</a></li>
                        <li><a href="#">June 2020</a></li>
                        <li><a href="#">May 2020</a></li>
                        <li><a href="#">April 2020</a></li>
                    </ol>
                </div>
                <div class="p-4">
                    <h4 class="fst-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
