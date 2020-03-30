@extends('layouts.app')
@section('content')
<div class="row">

 
   <div class="col-md-12">
      <table class="table table-bordered table-striped">
         <tr>
            <th>Name</th>
            <th>Registration No.</th>
            <th>Exam Title</th>
            <th>Exam Result</th>
        </tr>
        @foreach($studinfo as $key => $row)
            <tr>
              <th>{{ $row->name }}</th>
              <th>{{ $row->registration_no }}</th>
              <th>{{ $examinfo[$key]->title }}</th>
              <th>{{ $row->exam_result }}</th>
 
            </tr>
        @endforeach
        </table>
    </div>
</div>
@endsection