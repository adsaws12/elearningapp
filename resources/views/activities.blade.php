<div class="col-lg-8 col-md-8 col-12">
    <div class="card">
        <div class="card-body">
            <h2>Activities</h2>
            <hr>
            @foreach ($activities as $activity)
                    @if($activity->relationship)
                        <div class="media my-3">
                            <img src="/img/3.jpg" alt="" width="50" class="ml-3">
                            <div class="media-body">
                                <h6>You follow <a href="{{route('home.userslist.profileview', $activity->relationship->followedUser->id)}}">{{$activity->relationship->followedUser->name}}</a></h6>

                                @if($activity->notifiable_id == $activity->relationship->id)
                                    {{$activity->updated_at->diffForHumans()}}
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="media my-3">
                            <img src="/img/3.jpg" alt="" width="50" class="ml-3">
                            <div class="media-body">
                                <h6>You took {{$activity->answer->lesson->category->title}}</h6>
                                {{$activity->answer->lesson->updated_at->diffForHumans()}}
                            </div>
                        </div>
                    @endif
            @endforeach
        </div>
    </div>
</div>