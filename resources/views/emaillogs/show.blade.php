@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Email Logs</div>

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

                    <a title="Email Logs" class="btn btn-info" href="{{route('emaillog.index')}}"><i class="fas fa-mail-bulk"></i></a>
                    <a title="Delete" class="btn btn-danger" href="{{ route('emaillog.destroy', $emaillog->id) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{$emaillog->id}}').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>

                    <form id="delete-form-{{$emaillog->id}}" action="{{ route('emaillog.destroy', $emaillog->id) }}" method="POST" style="display: none;">
                        @method('DELETE')
                        @csrf
                    </form>
                    {!! $emaillog->body !!}
                </div> <!-- end card body -->
            </div> 
        </div>
    </div>
</div>
@endsection
