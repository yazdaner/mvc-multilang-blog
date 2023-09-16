<div x-show="open{{$reply->parent->id ?? $comment->id}}" x-data="{ open{{$reply->id}}: false }">

    <div class="comment d-flex align-items-start m-5">
        <img src="{{$reply->user->getUserProfile()}}" alt="" class="img-fluid rounded-circle me-4" style="max-width: 80px;">
        <div class="w-100">
            <div class="mb-3">
                <span class="fw-bold me-3">{{$reply->user->name}}</span>
                <span>{{$reply->created_at->diffForHumans()}}</span>
            </div>
            <p class="lh-lg">{{$reply->body}}</p>
            <div class="d-flex align-items-start justify-content-between">
                <a class="btn btn-primary" onclick="setReplyValue({{$reply->id}},'{{$reply->user->name}}')" href="#response">{{__('Reply')}}</a>
                @if ($reply->approvedReplies->count() > 0)
                    <button class="btn btn-outline-secondary" x-on:click="open{{$reply->id}} = ! open{{$reply->id}}">Show {{__('Show Replies')}}</button>
                @endif
            </div>
        </div>

    </div>

    @if ($reply->approvedReplies->count() > 0)

        @foreach ($reply->approvedReplies as $reply)
            @include('home.sections.replyComments',['reply'=>$reply])
        @endforeach

    @endif

</div>

