

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Forum Threads</div>

                <div class="panel-body">
                @foreach($threads as $thread)
                <article>
                    <h3>{{$thread->title}}</h3>
                    <div class="body">{{$thread->body}}</div>
                </article>
                @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection