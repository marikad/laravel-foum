@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Forum Thread</div>

                <div class="panel-body">
                    <form method="POST" action="/threads">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="body">Body:</label>
                            <textarea name="body" id="body" class="form-control" rows="8"></textarea>
                            <button type="submit" class="btn btn-primary">Publish</button>

                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection