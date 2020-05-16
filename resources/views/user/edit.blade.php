@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="text-center"> <h2> EDIT WORKSPACE</h2></div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ url('/todo/'.$todo->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Title ..." name="title" value="{{$todo->title}}">
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Tag</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"  id="gridRadios1" name="type" value="Web Design">
                                    <label class="form-check-label" for="gridRadios1">
                                        Web Design
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"  id="gridRadios2" name="type" value="Illustration">
                                    <label class="form-check-label" for="gridRadios2">
                                        Illustration
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="gridRadios2" name="type" value="UX/UI">
                                    <label class="form-check-label" for="gridRadios2">
                                        UX/UI
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
{{--                    <div class="form-group">--}}
{{--                        <label for="formGroupExampleInput">Cover Image</label>--}}
{{--                        <input type="file" name="file" class="form-control" id="formGroupExampleInput">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="formGroupExampleInput">Artwork Image</label>--}}
{{--                        <input type="file" name="file1" class="form-control" id="formGroupExampleInput">--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label for="formGroupExampleInput">About Artwork</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="About ..." name="about" value="{{$todo->about}}">
                    </div>
                    <button type="submit" class="btn btn-outline-success col-12">SAVE</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
@endsection
