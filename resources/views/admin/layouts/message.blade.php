<div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">

                @foreach ($errors->all() as $error)
                    <li class="text-center">{{ $error }}</li>
                @endforeach

        </div><br/>
    @endif

    @if(\Session::has('success'))
        <div class="alert alert-success">
            <p class="text-center">{{ \Session::get('success')  }}</p>
        </div>
    @endif
</div>