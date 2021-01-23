@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <ul>
                        @foreach($posts as $post)
                            <li>
                                <p>{{ $post->user->name }}: {{ $post->body }}</p>
                                <p><a href="{{ route('posts.show', $post->id) }}">詳細を見る</a></p>
                                @if(Auth::id() === $post->user_id)
                                    <form method="POST" action="{{ route('posts.delete', $post->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </form>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection