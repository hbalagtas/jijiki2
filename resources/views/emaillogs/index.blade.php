@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

                    @if ( $emaillogs->count() > 0)
                    <p></p>
                    <table class="table table-striped table-hover" id="emaillogstable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subject</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($emaillogs as $emaillog)
                            <tr>
                                <td>{{$emaillog->id}}</td>
                                <td>{{$emaillog->subject}}</td>
                                <td>{{$emaillog->date}}</td>
                                <td>
                                    <a href="{{route('emaillog.show', $emaillog->id)}}" title="Edit"><i class="fas fa-eye"></i></a>                                     
                                    <a title="Delete" href="{{ route('emaillog.destroy', $emaillog->id) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{$emaillog->id}}').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                    <form id="delete-form-{{$emaillog->id}}" action="{{ route('emaillog.destroy', $emaillog->id) }}" method="POST" style="display: none;">
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
        $('#emaillogstable').DataTable();
    } );
</script>
@endpush