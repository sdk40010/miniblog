@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post->user->name }}</div>

                <div class="card-body">
                    <p class="card-text">{{ $post->body }}</p>

                    @auth
                        @unless($isBookmarked)
                            <form method="POST" action="{{ route('bookmarks.add', $post->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-success">ブックマークする</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('bookmarks.remove', $post->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">ブックマークを解除する</button>
                            </form>
                        @endunless
                    @endauth 
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($post->replies as $reply)
                <div class="card">
                    <div class="card-header">{{ $reply->user->name }}</div>

                    <div class="card-body">
                        <!-- 改行を表示 -->
                        <p class="card-text">{!! nl2br(e($reply->body)) !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@auth
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ Auth::user()->name }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.reply', $post->id) }}">
                            @csrf
                            <div class="form-group">
                                <textarea name="body" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">返信する</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endauth

@endsection