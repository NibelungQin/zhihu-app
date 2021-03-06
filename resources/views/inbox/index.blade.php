@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">私信列表</div>
                    <div class="panel-body">
                        @foreach($messages as $key=>$messageGroup)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        @if(Auth::id()==$key)
                                            <img width="36px" src="{{$messageGroup->first()->fromUser->avatar}}" alt="">
                                        @else
                                            <img width="36px" src="{{$messageGroup->first()->toUser->avatar}}" alt="">
                                        @endif
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="#">
                                            @if(Auth::id()==$key)
                                                {{$messageGroup->first()->fromUser->name}}
                                            @else
                                                {{$messageGroup->first()->toUser->name}}
                                            @endif
                                        </a>
                                    </h4>
                                    <p>
                                        <a href="/inbox/{{$messageGroup->first()->dialog_id}}">
                                            {{ $messageGroup->last()->body }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection