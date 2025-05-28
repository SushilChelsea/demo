@extends('layout.app')

@section('title', 'View Card')

@section('content')
    <div class="content" style="width: 50%; margin:0 auto;">

        <input type="hidden" id="cardId" name="cardId" value="{{$card->id}}">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Card Name</span>
            <input type="text" name="cardName" id="cardName" class="form-control" value="{{ $card->name}}"
                aria-label="Cardname" aria-describedby="basic-addon1" readonly>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Tags</span>
            <input type="text" name="tags" id="tags" class="form-control" value="{{ implode(",", $card->tags)}}"
                aria-label="tags" aria-describedby="basic-addon2" readonly>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">Description</span>
            <textarea name="description" id="description" class="form-control" aria-label="desc"
                aria-describedby="basic-addon3" style="width: 85%;" readonly>{{ $card->description }}</textarea>
        </div>
        <div class="form-check mb-3 form-switch">
            @php
                $checked = $card->isHighlight ? 'checked' : '';
            @endphp
            <input class="form-check-input" type="checkbox" role="switch" name="isHighlight" id="checkDefault" {{$checked}}
                disabled>
            <label class="form-check-label" for="checkDefault">
                Highlighted
            </label>
        </div>
        <div class="input-group mb-3">
            <input type="button" value="Edit" class="btn btn-secondary" id="viewEdit">
            <input type="button" value="Delete" class="btn btn-warning" id="viewDelete">
        </div>

    </div>
@endsection