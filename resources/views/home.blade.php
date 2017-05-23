@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">File Upload</div>

                <div class="panel-body">
                    <form enctype="multipart/form-data" method="POST">
                        {{csrf_field()}}
                        FileName:<input type="text" name="fileName">
                        <input type="file" name="file">
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
