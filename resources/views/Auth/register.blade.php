@extends('layouts.app')
@section('content')
  <div class="max-width">
    <div class="flex justify-center">
        <div class="bg-white w-11/12 md:w-8/12 lg:w-7/12 m-6 rounded p-6">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" placeholder="Name" name="name" id="name"
                        class="border-2 w-full bg-gray-100 p-4 rounded @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-500 mt-2 text-sm text-center">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="sr-only">Username</label>
                    <input type="text" placeholder="Username" name="username" id="Username"
                        class="border-2 w-full bg-gray-100 p-4 rounded @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}">
                    @error('username')
                        <div class="text-red-500 mt-2 text-sm text-center">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
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
                    <label for="password_confirmation" class="sr-only">Password Again</label>
                    <input type="password" placeholder="Repeat Password" name="password_confirmation"
                        id="password_confirmation" class="border-2 w-full bg-gray-100 p-4 rounded">
                </div>
                <div class="mb-6">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full capitalize">register</button>
                </div>
                <div class="">
                    <a href="{{ route('login') }}" id="register" class="bg-blue-500 text-white py-3 flex justify-center px-5 rounded font-medium w-full capitalize">login</a>
                </div>
            </form>
        </div>
    </div>
  </div>
@endsection
