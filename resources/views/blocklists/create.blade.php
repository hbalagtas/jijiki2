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
                    
                    {{Form::open(['route' => 'blocklist.store'])}}
                    @include('feeds.form')
                    <div class="form-group">
                        {{Form::submit('Add Keyword',['class' => 'form-control'])}}    
                    </div>                    
                    {{Form::close()}}

                    <p>Blocklist</p>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Keyword</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Blocklist::all() as $blocklist)
                            <tr>
                                <td>{{$blocklist->id}}</td>
                                <td>{{$blocklist->keyword}}</td>
                                <td>{{$blocklist->created_at->diffForHumans()}}</td>
                                <td><a href="{{route('blocklist.edit', $blocklist->id)}}">Edit</a></td>
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
