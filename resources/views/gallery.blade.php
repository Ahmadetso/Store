@extends('layouts.main')

@section('head')
@endsection

@section('content')
    <div>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

        <div class="container mt-5">
            <form action="{{ route('search') }}" method="get">
                <div class="row d-flex justify-content-center">
                    <button type="submit" class="col-1 btn btn-secondary bg-secondary mb-2">search</button>
                    <input type="text" class="col-3 mx-sm-3 mb-3" name="term" placeholder="search...">

                </div>

            </form>
            <h2 class="mb-4"> {{ $title }} </h2>
            <div class="row g-4">
                @foreach ($books as $book)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $book->image) }}" height="290" class="card-img-top"
                                alt="Product Image">
                            <div class="card-body">
                                <a href="{{ route('book-show', $book) }}">
                                    <h5 class="card-title">{{ $book->title }}</h5>
                                </a>
                                <a href="{{ route('gallery-category', $book->category->id) }}">
                                    <p class="card-text">{{ $book->category->name }}</p>
                                </a>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 mb-0">{{ $book->price }}</span>
                                    <div>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-half text-warning"></i>
                                        <small class="text-muted">(4.5)</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light">
                                <button class="btn btn-primary btn-sm">Add to Cart</button>
                                <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-heart"></i></button>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>
@endsection
