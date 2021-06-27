@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

  <div class="card uper">

  <div class="card-header">
    <a class="btn btn-primary" href="{{ route('note.create') }}"> Create New Note</a>
  </div>
 
  <div class="card-body">
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
     <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Note Title</td>
          <td>Note Body</td>
          <td colspan="3">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($notes as $note)
        <tr>
            <td>{{$note->id}}</td>
            <td>{{$note->title}}</td>
            <td>{{$note->body}}</td>
            <td><a href="{{ route('note.edit',$note->id)}}" class="btn btn-primary">Edit</a></td>
            <td><a class="btn btn-primary" href="{{ route('note.show',$note->id) }}">Show</a></td>
            <td>
                <form action="{{ route('note.destroy', $note->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
</div>
  
@endsection