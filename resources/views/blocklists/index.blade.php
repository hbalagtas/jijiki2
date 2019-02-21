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
                    @include('blocklists.form')
                    <div class="form-group">
                        {{Form::submit('Add Keyword',['class' => 'form-control'])}}    
                    </div>                    
                    {{Form::close()}}

                    @if ( Blocklist::all()->count() > 0)
                    <p>Blocklist</p>
                    <table class="table table-striped table-hover" id="keywordtable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Keyword</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Blocklist::orderBy('keyword')->get() as $blocklist)
                            <tr>
                                <td>{{$blocklist->id}}</td>
                                <td>{{$blocklist->keyword}}</td>
                                <td>{{$blocklist->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('blocklist.edit', $blocklist->id)}}" title="Edit"><i class="fas fa-edit"></i></a>                                     
                                    <a title="Delete" href="{{ route('blocklist.destroy', $blocklist->id) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{$blocklist->id}}').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                    <form id="delete-form-{{$blocklist->id}}" action="{{ route('blocklist.destroy', $blocklist->id) }}" method="POST" style="display: none;">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                    @endif
                </div> <!-- end card body -->
            </div> 
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready( function () {
        $('#keywordtable').DataTable();
    } );
</script>
@endpush
