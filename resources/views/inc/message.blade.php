@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert">
            <span>x</span>
        </button>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session ('success') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>x</span>
        </button>
    </div>
@endif


@if(session('notfound'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session ('notfound') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>x</span>
        </button>
    </div>
@endif
