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
                    @include('feeds.form')
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->feeds as $feed)
                            <tr>
                                <td>{{$feed->id}}</td>
                                <td>{{$feed->name}}</td>
                                <td>{{$feed->created_at->diffForHumans()}}</td>
                                <td>
                                    <a title="Edit" href="{{route('feed.edit', $feed->id)}}"><i class="fas fa-edit"></i></a>
                                    <a title="Delete" href="{{ route('feed.destroy', $feed->id) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{$feed->id}}').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                    <form id="delete-form-{{$feed->id}}" action="{{ route('feed.destroy', $feed->id) }}" method="POST" style="display: none;">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
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
