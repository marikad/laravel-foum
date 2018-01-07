@extends('layouts.app')

@section('content')

<div class="container">
<div class="page-header">
    <h1>{{$profileUser->name}}</h1>
    <small>Since {{$profileUser->created_at->diffForHumans()}}</small>
</div>

@foreach($profileUser->threads as $thread)

<div class="panel panel-default">
                <div class="panel-heading">

                    <a href="">{{$thread->owner->name . " "}}</a>posted:
                    {{ $thread->title }}
                </div>

            <div class="panel-body">
                {{ $thread->body }}
            </div>
         </div>


@endforeach
</div>
@endsection