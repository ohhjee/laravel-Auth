@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="bg-white w-11/12 md:w-6/12 lg:w-4/12 m-6 rounded p-6">
            @if (session('status'))
                <div class="bg-red-500 mb-3 py-4 text-white capitalize font-medium rounded text-center">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('token-verification') }}" method="post">
                @csrf
                <div class="mb-4 d-none">
                    <input type="hidden" name="token"
                           class="border-2 w-full p-4 bg-gray-200 rounded"
                           value="{{$token}}">
                </div>
                <div class="mb-4">
                    <label for="name" class="sr-only">password</label>
                    <input type="password" placeholder="Enter New password " name="password" id="password"
                           class="border-2 w-full bg-gray-100 p-4 rounded @error('password') border-red-500 @enderror">
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm text-center">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="sr-only">confirm password</label>
                    <input type="password" placeholder="Enter confirm password " name="password_confirmation"
                           id="password"
                           class="border-2 w-full bg-gray-100 p-4 rounded @error('password_confirmation') border-red-500 @enderror">
                </div>
                <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full capitalize">reset
                        password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
