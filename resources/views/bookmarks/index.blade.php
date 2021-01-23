@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @forelse($posts as $post)
                <div class="card">
                    <div class="card-header">{{ $post->user->name }}</div>

                    <div class="card-body">
                        <p class="cardt-text">{{ $post->body }}</p>
                        <p class="cardt-text"><a href="{{ route('posts.show', $post->id) }}">詳細を見る</a></p>
                    </div>
                </div>
            @empty
                <p>ブックマークはありません</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
