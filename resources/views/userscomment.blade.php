@extends('layouts.base')

@section('title')
Комментарии пользователя
@endsection

@section('content')
<div>
    <h3 class="font-bold text-center pt-3">{{ $user->name }} </h3>
    @foreach($comments as $comment)
       <h4 class="font-bold pt-3"> {{ $comment->title }}, <img class="h-4 inline mb-1.5" src="/images/rating.png"> {{ $comment->rating }} </h4>
        <p>{{ $comment->body }}</p>
    @endforeach

</div>
@endsection
