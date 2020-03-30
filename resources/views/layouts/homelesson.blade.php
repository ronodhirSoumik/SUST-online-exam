<div class="row">

 
   <div class="col-md-12">
      <table class="table table-bordered table-striped">

        @foreach($course->lessons as $lesson)
        {{ $loop->iteration }}. <a href="{{ route('lessons.show',[$lesson->title])  }}" > {{$lesson->title}}</a>
            <tr>
              <th>{{$lesson->title}}</th>
 
            </tr>
        @endforeach
        </table>
    </div>
</div>