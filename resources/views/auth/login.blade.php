@extends('layouts.userLayout')
@section('title', 'Login')

@section('content')
<section class="bg-primary" >
    <div class="container py-5  ">
      <div class="row d-flex justify-content-center align-items-center ">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                  <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="d-flex align-items-center mb-3 pb-1">
                        <i class='bx bxs-cube-alt text-primary fs-1' ></i>
                      <span class="h1 fw-bold mb-0">Logo</span>
                    </div>
  
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
  
                    <div class="form-outline mb-4">
                        <input type="email" id="form2Example17" name='email' class=" @error('email') is-invalid @enderror form-control form-control-lg" value="{{old('email')}}" />
                        @error('email')
                                  <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      <label class="form-label" for="form2Example17">Email address</label>
                    </div>
  
                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example27" name='password' class=" @error('password') is-invalid @enderror form-control form-control-lg" /> 
                      @error('password')
                                  <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                      <label class="form-label" for="form2Example27">Password</label>
                    </div>
  
                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                    </div>
  
                    <a class="small text-muted" href="#!">Forgot password?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{ route('view.register') }}"
                        style="color: #393f81;">Register here</a></p>
                  </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection