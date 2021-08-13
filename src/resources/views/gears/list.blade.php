@extends('layouts.view')

@section('content')

    @include('users.user')

    @include('commons.tab')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            @if($gears->isEmpty())
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="card-title">
                            <p>ギアの登録はありません</p>
                        </div>
                    </div>
                </div>
            @else
                @foreach($gears as $gear)
                    <div class="card-deck">
                        <div class="card mt-4">
                            <div class="row no-gutters">
                                <div class="col-lg-5 my-auto">
                                    @foreach($gear->gearImgs as $gearImg)
                                    <img src="{{ asset('storage/images/'.$gearImg->img_path) }}" width="300" height="200" >
                                    @endforeach
                                </div>
                                <div class="card-body col-lg-7">
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
                        </div>
                    </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>
@endsection('content')