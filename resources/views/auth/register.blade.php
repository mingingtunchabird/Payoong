
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <br>
    <br>

    <style>

    body{
        background-color: #F5F5F5;
        font-family: Mitr-regular !important;
    }

    .btn-regis{
    background-color: #2B4161;
    color: white;
    width: 10rem;
    height: 3rem;
    border-radius: 10px;
    text-align: center;
    /* margin-left: 200px; */
    left: 50%;
    border: none;



}

    .parent{
    /* display: flex;
    justify-content: center;
    align-items: center; */
    background-color: #ffffff;


}

.content-div{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #ffffff;
    width: 60%;
    height: fit-content;
    border-radius: 10px;
    -webkit-box-shadow: 0px 0px 15px 3px rgba(160,160,160,0.33);
    box-shadow: 0px 0px 15px 3px rgba(160,160,160,0.33);
    /* text-align: center; */
}

    </style>



<div class="parent">
    <div class="content-div">
        {{-- <div class="col-md-8"> --}}
            {{-- <div class="card"> --}}
                <div class="text-center">   <img src="https://sv1.picz.in.th/images/2021/02/11/o1lNH9.png" width="250" height="50" style="margin-top: 70px;">
                </div>

                <div style="margin-left: 100px; width: 250px;">
                    <h4 style="color: #2B4161; ">ลงทะเบียน</h4>
                </div>


                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4"> --}}

                                <div style="text-align: center">
                                    <button type="submit" class="btn-regis">
                                        {{ __('ลงทะเบียน') }}
                                    </button>
                                </div>

                            {{-- </div>
                        </div> --}}
                    </form>
                {{-- </div> --}}
            {{-- </div> --}}
        {{-- </div> --}}
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

