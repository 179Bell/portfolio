@extends('layouts.view')

@section('content')

    @include('users.user')

    @include('commons.tab')

    <div class="container">
    <div class="row">
        @if($gears->isEmpty())
            <p>ギアの登録はありません</p>
        @else
            @foreach($gears as $gear)
                <div class="card-deck">
                    <div class="card mt-4" style="width: 20rem;">
                        @foreach($gear->gearImgs as $gearImg)
                            <img src="{{ asset('storage/images/'.$gearImg->img_path) }}" width="300" height="200" >
                        @endforeach
                        <div class="card-title">
                            <h3>{{ $gear->name }}</h3>
                            <p>{{ $gear->maker_name }}</p>
                            <p>{{ $gear->comment }}</p>
                        </div>
                        @if($user->id == Auth::id())
                            <form method="POST" action="{{ route('gears.destroy', ['gear' => $gear]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>削除する</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    </div>
@endsection('content')