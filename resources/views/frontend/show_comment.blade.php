<ol class="comments-list">
    @foreach($comments as $comment)
    <li>
        <div class="media">
            <div class="thumb-left">
                <a href="#">
                    <img class="img-fluid" src="{{ asset('public/profiles') }}/{{ $comment['user']['image'] }}" onerror="this.src='{{ asset('site/user-icon.png') }}'" alt="user-icon">
                </a>
            </div>
            <div class="info-body">
                <div class="media-heading">
                    <h4 class="name">{{ $comment->user->fname ?? '' }}</h4>
                    <span class="comment-date"><i class="lni-alarm-clock"></i> {{ date('d M h:i a', strtotime($comment->created_at)) }}</span>
                    <!--<a href="#" class="reply-link"><i class="lni-reply"></i> Reply</a>-->
                </div>
                <p>{{ $comment->body ?? '' }}</p>
            </div>
        </div>
    </li>
    @endforeach
</ol>
