@extends('layouts.app')
@section('content')
 <div class="max-width">
    <div class="flex justify-center">
        <div class="bg-white w-11/12 md:w-8/12 lg:w-7/12 m-6 rounded p-6">
            @if (session('status'))
                <div class="bg-red-500 mb-3 py-4 text-white capitalize font-medium rounded text-center">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">email</label>
                    <input type="email" placeholder="Your Email" name="email" id="email"
                        class="border-2 w-full bg-gray-100 p-4 rounded @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm text-center">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="sr-only">Password</label>
                    <input type="password" placeholder="Choose a Password" name="password" id="password"
                        class="border-2 w-full bg-gray-100 p-4 rounded @error('password') border-red-500 @enderror ">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm text-center">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <input type="checkbox" class="mr-2" name="remember" id="remember">
                            <label for="remember" class="capitalize">remember me</label>
                        </div>

                        {{-- <input type="checkbox" class="mr-2" name="remember" id="remember"> --}}
                        <a href="{{ route('VerifyMail') }}" class="text-right capitalize">forget password</a>
                        {{-- <label for="remember" class="capitalize">remember me</label> --}}
                    </div>
                </div>

                <div class="mb-6">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full capitalize">login</button>
                </div>
                <div class="">
                    <a href="{{ route('register') }}" id="register"
                        class="bg-blue-500 text-white py-3 flex justify-center px-5 rounded font-medium w-full capitalize">register</a>
                </div>
            </form>
        </div>
    </div>
 </div>
@endsection
