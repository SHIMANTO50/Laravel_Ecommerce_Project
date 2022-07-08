@extends('layouts.adminlayout')

@section('body')
 <div class="d-flex align-items-center justify-content-center bg-br-primary ht-50v">

    <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">
      <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> bracket <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
      <div class="tx-center mg-b-10">The Admin Template For Perfectionist</div>

     <!-- Validation Errors -->
     <x-auth-validation-errors class="mb-4" :errors="$errors" />

     <form method="POST" action="{{ route('register') }}">
         @csrf
          <!--Full Name -->
          <div class="form-group">
            <x-label for="fname" :value="__('Full Name')" />

            <x-input id="fname" class="form-control" placeholder="Enter Your Full Name" type="text" name="fname" :value="old('fname')" required autofocus />
        </div>


         <!-- Name -->
         <div class="form-group">
             <x-label for="name" :value="__('Name')" />

             <x-input id="name" class="form-control" placeholder="Enter Your Name" type="text" name="name" :value="old('name')" required autofocus />
         </div>

         <!-- Email Address -->
         <div class="form-group">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="form-control" placeholder="Enter Your Email" type="email" name="email" :value="old('email')" required autofocus />
        </div>

         <!-- Role Define -->
         <div class="mt-2 form-group">
             <x-label for="role" :value="__('Role')" />
             <select name="role" id="role" class="form-control" required>
                <option value="0">---Select Role---</option>
                <option value="1">Admin</option>
                <option value="2">Vendor</option>
                <option value="3">User</option>
             </select>
         </div>

         <!-- Password -->
         <div class="mt-2 form-group">
             <x-label for="password" :value="__('Password')" />

             <x-input id="password" class="form-control" placeholder="Enter Password"
                             type="password"
                             name="password"
                             required autocomplete="new-password" />
         </div>

         <!-- Confirm Password -->
         <div class="mt-2 form-group">
             <x-label for="password_confirmation" :value="__('Confirm Password')" />

             <x-input id="password_confirmation" class="form-control" placeholder="Confirm Password"
                             type="password"
                             name="password_confirmation" required />
         </div>

         <div class="flex items-center justify-end mt-2 form-group">
             <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                 {{ __('Already registered?') }}
             </a>

             <button type="submit" class="btn btn-info btn-block">Sign Up</button>
         </div>
         <div class="mg-t-20">Already Registered? <a href="{{Route('login')}}" class="tx-info">Sign In</a></div>
     </form>

    </div><!-- login-wrapper -->
  </div><!-- d-flex -->

@endsection