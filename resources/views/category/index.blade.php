@extends('layouts.main')
@section('content')
<main class="blog">
    <h1 class="edica-page-title" data-aos="fade-up">Категории</h1>
    <div class="container px-4" >
        <div class="row gx-5">

            <div class="col">
                <section class="featured-posts-section">
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{route('category.post.index', $category->id)}}">{{$category->title}}</a></li>
                        @endforeach
                    </ul>
                </section>
            </div>
        </div>

        <div class="container px-4">
            <div class="row gx-5">
                <div class="col">
                    <div class="p-3 border bg-light"></div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light"></div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
