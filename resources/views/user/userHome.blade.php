@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

@section('content')

    <form method="get" action="{{ route('search') }}" >
        <div class="container">
            <div class="row">
                <div class="input-group col align-self-end">
                    <input type="text" class="form-control  text-center"  placeholder="Search ..." name="search" >
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </div>

    </form>

{{--    <form method="get" action="{{ route('filter') }}" >--}}
{{--    <div class="flex-center position-ref full-height text-center m-5">--}}
{{--        <button class="btn btn-primary" type="submit" name="Web Design">Web</button>--}}
{{--        <input>--}}
{{--        <a href="/home"  class="p-3" style="color: black;">All</a>--}}
{{--        <a href="" name="Web" class="p-3" style="color: black;">Web Design</a>--}}
{{--        <a href="" name="Illustration" class="p-3" style="color: black;">Illustration</a>--}}
{{--        <a href="" name="UXUI" class="p-3" style="color: black;">UX/UI</a>--}}

{{--        </div>--}}
{{--    </form>--}}




    @if(count($todos)>0)

    <div class="container-fluid m-4">
        <div class="row">
            @foreach($todos as $todo)
            <div class="col-3">
                <div class="card" style="width: 27rem;">
                    <img class="card-img-top" src="{{ url('uploads/'.$todo->file_name) }}" alt="Card image cap" >
                    <div class="card-body">
                        <h4 class="card-text">{{$todo->title}}</h4>
                        <p class="card-text">{{$todo->about}}</p>
                        <p class="card-text"> @ {{$todo->type}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
{{--            <div class="col-3">--}}
{{--                <div class="card" style="width: 27rem;">--}}
{{--                    <img class="card-img-top" src="https://cdn.dribbble.com/users/2407/screenshots/11389593/media/17514d8941b2032b32b267646a1f61b9.png" alt="Card image cap">--}}
{{--                    <div class="card-body">--}}
{{--                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-3">--}}
{{--                <div class="card" style="width: 27rem;">--}}
{{--                    <img class="card-img-top" src="https://cdn.dribbble.com/users/2407/screenshots/11389593/media/17514d8941b2032b32b267646a1f61b9.png" alt="Card image cap">--}}
{{--                    <div class="card-body">--}}
{{--                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-3">--}}
{{--                <div class="card" style="width: 27rem;">--}}
{{--                    <img class="card-img-top" src="https://cdn.dribbble.com/users/2407/screenshots/11389593/media/17514d8941b2032b32b267646a1f61b9.png" alt="Card image cap">--}}
{{--                    <div class="card-body">--}}
{{--                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
@endsection
