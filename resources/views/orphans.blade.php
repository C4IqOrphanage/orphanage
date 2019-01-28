@extends('layout.app')

@section('content')
<link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">
<div class="orphans-body">
    <div class="container">
         @can('kind', Auth::user())
           <div class="text-center">
                <a class="btn btn-success" href="/orphans/create">اضافة يتيم</a>
           </div>
         @endcan
        <div class="row">
             @foreach ($orphans as $orphan)
               @if(count($orphan) > 0)
                  <div class="col-lg-3 col-md-4 col-sm-6">
                     <div class="orphan">
                         <div class="image">
                             <img class="img" src="{{asset('image')}}/{{$orphan->image}}" />
                         </div>
                         <div class="text">
                             <h3 class="text-center name">{{$orphan->name}}</h3>
                             <h5 class="text-center age">{{$orphan->age}}</h5>
                             <p class="hidden id">{{$orphan->id_number}}</p>
                             <p class="hidden governorate">{{$orphan->governorate}}</p>
                             <p class="hidden hobbies">{{$orphan->hobbies}}</p>
                             <p class="hidden case">{{$orphan->case}}</p>
                              @if (!Auth::guest())
                                   @cannot('kind', Auth::user())
                                        @if ($counts == 0)
                                             {!! Form::open(['action' => ['myorphanController@story', $orphan->id, Auth()->user()->id], 'method' => 'POST']) !!}
                                                  {{Form::submit('اضافة الى ايتامي', ['class'=>'btn btn-primary  pull-right'])}}
                                             {!! Form::close() !!}
                                        @endif


                                        @foreach($myorphans as $myorphan)

                                                  @if(auth()->user()->id == $myorphan->user_id && $orphan->id !== $myorphan->orphan_id)
                                                       {!! Form::open(['action' => ['myorphanController@story', $orphan->id, Auth()->user()->id], 'method' => 'POST']) !!}
                                                            {{Form::submit('اضافة الى ايتامي', ['class'=>'btn btn-primary  pull-right'])}}
                                                       {!! Form::close() !!}
                                                  @endif
                                        @endforeach
                                   @endcannot


                                   @can('kind', Auth::user())
                                        {!! Form::open(['action' => ['orphansController@destroy', $orphan->id], 'method' => 'DELETE']) !!}
                                             {{Form::submit('حذف', ['class'=>'btn btn-danger  pull-right'])}}
                                        {!! Form::close() !!}

                                        <a class="btn btn-success pull-right" href="http://localhost:8000/orphans/{{$orphan->id}}/edit">تعديل</a>
                                   @endcan
                              @endif
                             <button class="btn btn-success more">المزيد</button>
                         </div>
                     </div>
                  </div>

                  @else
                    <h2 class="text-center">لايوجد ايتام</h2>
                  @endif
             @endforeach

        </div>

        <!-- more information -->
        <div class="info">
             <div class="image">
                  <img src="" />
             </div>
             <h3 class="show-name text-center"></h3>
             <p class="show-age"></p>
             <p class="show-id"></p>
             <p class="show-governorate"></p>
             <p class="show-hobbies"></p>
             <p class="show-case"></p>
             <div class="text-center">
                  <button class="closes">اغلاق</button>
             </div>

        </div>

    </div>
</div>

<!-- start footer -->
<div class="footer text-center">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook-f"></i></a>
            </div>
            <div class="col-7">
                <p>جميع الحقوق &copy; محفوظة لدار الايتام</p>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->
@endsection
