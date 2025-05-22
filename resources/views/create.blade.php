@extends('layout.app')

@section('title', 'Create Card')

@section('content')
    <div class="content" style="width: 50%; margin:0 auto;">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('card.submit') }}">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Card Name</span>
                <input type="text" name="cardName" class="form-control" placeholder="Card Name" aria-label="Cardname"
                    aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Tags</span>
                <input type="text" name="tags" class="form-control" placeholder="comma separated tags like  html,css,php"
                    aria-label="tags" aria-describedby="basic-addon2">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Description</span>
                <textarea name="description" class="form-control" placeholder="Write a description about a card"
                    aria-label="desc" aria-describedby="basic-addon3" style="width: 85%;"></textarea>
            </div>
            <div class="form-check mb-3 form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="isHighlight" id="checkDefault">
                <label class="form-check-label" for="checkDefault">
                    Highlighed
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection