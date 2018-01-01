@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Forum</div>

                <div class="panel-body">
                  @foreach($threads as $thread)
                    <article>
                        <h3> <a href="{{ $thread->path() }}">{{ $thread->title }}</a></h3>
                        <div class="body">{{$thread->body}}</div>
                    </article>
                    <hr>
                  @endforeach
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection