@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="bg-white w-11/12 my-6 capitalize rounded p-6">
            @auth
                <div class="capitalize font-semibold">welcome to home page</div>
            @endauth
            @guest
                <div class="capitalize font-semibold">home page</div>

                <div class="text-xs capitalize font-medium">
                    <small>
                        sign in to access the dashboard.
                    </small>
                </div>
            @endguest
        </div>

    </div>
@endsection
