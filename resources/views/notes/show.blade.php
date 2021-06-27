@extends('layouts.app')
 
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    View Note
 
 
                <a class="btn btn-primary" href="{{ route('note.index') }}"> Back</a>
 
            
  </div>
  <div class="card-body">
     <div class="row">
 
        <div class="col-xs-12 col-sm-12 col-md-12">
 
            <div class="form-group">
 
                <strong>Title:</strong>
 
                {{ $note->title }}
 
            </div>
 
        </div>
       
 
        <div class="col-xs-12 col-sm-12 col-md-12">
 
            <div class="form-group">
 
                <strong>Body:</strong>
 
                {{ $note->body }}
 
            </div>
 
        </div>
 
    </div>
    
  </div>
</div>
@endsection