<div class="container">
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-5 d-flex justify-content-end">
                    <img src="{{ asset('https://shingoportfolio.s3.ap-northeast-1.amazonaws.com/'.$user->avatar )}}" class="rounded-circle border border-black" height="200" width="200">
                </div>
                
                <div class="col-lg-7 d-flex justify-content-center align-items-center">
                    <div class="">
                        <h3>名前&emsp;:&emsp;{{ $user->name }}</h3>
                        <h3>愛車&emsp;:&emsp;{{ $user->bike }}</h3>
                    </div>
                </div>
            </div>

            <!-- <div>
            <a class="btn btn-blue-grey btn-block col-lg-5" href="{{ route('top') }}"><i class="fas fa-angle-double-left"></i>戻る</a>
            </div> -->
        </div>
    </div>
</div>

