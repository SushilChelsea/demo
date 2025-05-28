@extends('layout.app')

@section('title', 'Cards')

@section('content')
    <div class="container py-5">
        <div class="d-flex">
            <h1 class="mb-4">All Cards</h1>
            <div class="ms-auto"><a href="{{ url('create') }}" class="btn btn-warning">Add Card</a></div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($cards as $card)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $card->name }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($card->description, 100) }}</p>
                            <a href="{{ route('card.view', $card->id) }}" class="mt-auto btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection