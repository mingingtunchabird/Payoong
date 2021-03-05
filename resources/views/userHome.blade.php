
@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

@section('content')

    @csrf
    <style type="text/css">
        body { background: #F5F5F5 !important;}


        .box{

            height: 100vh;
            width: 100%;
            transform: translate(0px,100px);
            background-color: #F5F5F5;
            /* margin-top: 20vh; */
            border-radius: 10px;
        }

        .card{
            width: 19rem;
            margin-top: 30px;
            border-color: #FFFFFF;
        }




    </style>





{{--    <form method="get" action="{{ route('search') }}" >--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="input-group col align-self-end">--}}
{{--                    <input type="text" class="form-control  text-center"  placeholder="Search ..." name="search" >--}}
{{--                    <button class="btn btn-primary" type="submit">Search</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </form>--}}


    <div class="box" >



    <div class="container">
        <div class="row">
            <div class="col-12">

                    <p class="m-3" style="font-size: 30px;">ข้อมูลลูกบ้าน</p>

            </div>
        </div>
    </div>

    @if(count($todos)>0)

        <div class="container" id="data-user">
            <div class="row">
                @foreach($todos as $todo)
                    <div class="col-4" >
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text" style="font-size:1.6em; "> {{$todo->firstname}} - {{$todo->lastname}}</p>
                                <p class="card-text" style="font-weight: lighter;"> <i class="fas fa-door-open"></i> : {{$todo->roomid}}</p>
                                <p class="card-text" style="font-weight: lighter;"> <i class="fas fa-flag"></i>  : {{$todo->nationality}}</p>
                                <p class="card-text" style="font-weight: lighter;"> <i class="far fa-id-card"></i> : <?php
                                    $target = $todo->iden_num;
                                    $count = strlen($target) - 4;
                                    $output = substr_replace($target, str_repeat('x', $count), 0, $count);
                                    echo $output;
                                ?>
                                </p>
                                <p class="card-text" style="font-weight: lighter;"> <i class="fas fa-mobile-alt"></i> : {{$todo->phone}}</p>
                                <p class="card-text" style="font-weight: lighter;"> <i class="fas fa-envelope"></i> : {{$todo->email}}</p>
                                <p class="card-text" style="font-weight: lighter;"> <i class="fas fa-user-check"></i> : {{$todo->verify_code}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>

    </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

@endsection
