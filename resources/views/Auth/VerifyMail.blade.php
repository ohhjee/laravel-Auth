@extends('layouts.app')
@section('content')
  <div class="max-width">
    <div class="flex justify-center">
        <div class="bg-white w-11/12 md:w-6/12 lg:w-7/12 m-6 rounded p-6">
            @if (session('status'))
                <div class="bg-red-500 mb-3 py-4 text-white capitalize font-medium rounded text-center">
                    {{ session('status') }}
                </div>
            @endif
            
            @if (session('success'))
                <div class="bg-green-500 mb-3 py-4 text-white capitalize font-medium rounded text-center">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('VerifyMail') }}" method="post">
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
                <div class="mb-6">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full capitalize">send
                        reset link</button>
                </div>
            </form>
        </div>
    </div>
  </div>
@endsection
