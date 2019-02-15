@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Feed</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::model($feed, ['route' => ['feed.update', $feed] ]) !!}
                    @method('PUT')
                    @include('feeds.form')
                    <div class="form-group">
                        {{Form::submit('Update Feed',['class' => 'form-control'])}}    
                    </div>                    
                    {{Form::close()}}

                    
                </div> <!-- end card body -->
            </div> 
        </div>
    </div>
</div>
@endsection
