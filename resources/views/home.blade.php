@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

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

                    <p>Add a feed to start monitoring ads.</p>

                    {{Form::open(['route' => 'feed.store'])}}
                    <div class="form-group">
                        {{Form::label('name', 'Feed Name')}}
                        {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Road Bikes'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('feed', 'Feed Link')}}
                        {{Form::text('feed', null, ['class' => 'form-control', 'placeholder' => 'http://kijiji.rss'])}}
                    </div>
                     <div class="form-group">
                        {{Form::label('blocklist', 'Blocked Keywords')}}
                        {{Form::text('blocklist', "[spam|spam]", ['class' => 'form-control', 'placeholder' => '[spam|spam]'])}}
                    </div>
                    <div class="form-group">
                        {{Form::submit('Add Feed',['class' => 'form-control'])}}    
                    </div>                    
                    {{Form::close()}}

                    <p>Feed list</p>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->feeds as $feed)
                            <tr>
                                <td>{{$feed->id}}</td>
                                <td>{{$feed->name}}</td>
                                <td>{{$feed->created_at->diffForHumans()}}</td>
                            </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                </div> <!-- end card body -->
            </div> 
        </div>
    </div>
</div>
@endsection
