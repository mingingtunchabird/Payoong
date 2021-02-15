

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">



<style>




body{
    background-color: F5F5F5;
    font-family: Mitr-regular !important;



}


.cardjust{
    margin: 0 auto;
    width: 40rem;
    height: fit-content;
    background-color:#fff;
    border-radius: 10px;


}
.btn-login{
    background-color: #2B4161;
    color: white;
    width: 10rem;
    height: 3rem;
    border-radius: 10px;
    text-align: center;
    margin: 0 auto;

}
.input{
    padding: 0 0 2 2;
}



</style>





            <div class="cardjust">


{{--                <h2 class="p-5" style="text-align: center;">LOGO</h2>--}}
                <div class="text-center">   <img src="https://sv1.picz.in.th/images/2021/02/11/o1lNH9.png" width="187" height="35" style="margin-top: 70px;">
                </div>


                <div class="">
                    เข้าสู่ระบบ
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="">
                            <label for=""  style="color: #709EF9;">{{ __('E-Mail Address') }}</label>
                        </div>
                            <div >
                                <input type="email" class="input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        <div class="">
                            <label for="password" style="color: #709EF9;">{{ __('Password') }}</label>
                        </div>
                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        <div class="f">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <button type="submit" class="btn btn-login">
                                    {{ __('เข้าสู่ระบบ') }}
                                </button>
                            </div>
                        </div>

                        <div class="">
                            <div class="col-md-5 offset-md-4">
                                <a href="register">  ลงทะเบียน </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>






<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

