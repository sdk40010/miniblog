@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach($errors->all() as $message)
                            <div>{{ $message }}</div>
                        @endforeach
                        @if(Session::has('message'))
                            <div>{{ Session::get('message') }}</div>
                        @else
                            <div>変更ボタンを押してください</div>
                        @endif

                        <form method="POST" action="{{ route('users.update') }}">
                            @csrf
                            <label for="">名前: </label>
                            <input type="text" name="name" value="{{ $user->name }}" />
                            <label for="">メールアドレス: </label>
                            <input type="email" name="email" value="{{ $user->email}}" />
                            <button type="submit">変更</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection