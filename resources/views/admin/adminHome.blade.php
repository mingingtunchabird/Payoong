@extends('layouts.appadmin')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

@section('content')

{{--        <div class="flex-center position-ref full-height text-center m-5">--}}
{{--            <a href="" class="p-3" style="color: black;">All</a>--}}
{{--            <a href="" class="p-3" style="color: black;">Web Design</a>--}}
{{--            <a href="" class="p-3" style="color: black;">Illustration</a>--}}
{{--            <a href="" class="p-3" style="color: black;">UX/UI</a>--}}
{{--        </div>--}}

        <h2 style="float: top;" class="text-center"> All Artwork : {{ $counts  }}</h2>

    @if(count($todos)>0)
        <div class="container-fluid m-4">
            <div class="row">

                @foreach($todos as $todo)
                    <div class="col-3">
                        <div class="card" style="width: 27rem;">
                            <img class="card-img-top" src="{{ url('uploads/'.$todo->file_name) }}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-text">{{$todo->title}}</h4>
                                <p class="card-text">{{$todo->about}}</p>
                                <p class="card-text"> @ {{$todo->type}}</p>


                                <form action="{{ url('/todo/'.$todo->id) }}" method="post" form="form-delete">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-outline-danger" style="float: right;" type="submit" onclick="confirm_delete()">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>

                @endforeach

                @endif
            </div>

        </div>

{{--        <h4 class="m-5"> All Record = {{ $number }}</h4>--}}

{{--<div class="container m-4">--}}
{{--    <div class="row">--}}
{{--<table class="table">--}}
{{--    <thead class="thead-dark">--}}
{{--    <tr>--}}
{{--        <th scope="col" style=" font-family: 'Prompt SemiBold';">ID</th>--}}
{{--        <th scope="col" style=" font-family: 'Prompt SemiBold';">TITLE</th>--}}
{{--        <th scope="col" style=" font-family: 'Prompt SemiBold';">TYPE</th>--}}
{{--        <th scope="col" style=" font-family: 'Prompt SemiBold';">ABOUT</th>--}}

{{--    </tr>--}}
{{--    </thead>--}}
{{--    @if(count($todos)>0)--}}
{{--        @foreach($todos as $todo)--}}
{{--            <tbody>--}}
{{--            <tr class="table-light">--}}
{{--                <td style=" font-family: 'Prompt SemiBold';">{{$todo->id}} </td>--}}
{{--                <td style=" font-family: 'Prompt SemiBold';">{{$todo->title}} </td>--}}
{{--                <td style=" font-family: 'Prompt SemiBold';">{{$todo->type}}  </td>--}}
{{--                <td style=" font-family: 'Prompt SemiBold';">{{$todo->about}} </td>--}}
{{--            </tr>--}}
{{--            </tbody>--}}
{{--        @endforeach--}}
{{--    @endif--}}
{{--</table>--}}
{{--        </div>--}}
{{--</div>--}}
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script>
            function confirm_delete() {

                var confirm = window.confirm('ยืนยันการลบ ?');
                if (confirm) {
                    document.getElementById('form-delete').submit();
                }
            }
        </script>
        </body>

@endsection
