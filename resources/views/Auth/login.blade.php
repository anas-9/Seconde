@extends('Auth.layout')

@section('content')
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
    <form action="{{route('check')}}" method="Post">
        @csrf
        @method('head')
            @if(\Illuminate\Support\Facades\Session::get('fail'))
                <div class="alert alert-danger">
                    {{\Illuminate\Support\Facades\Session::get('fail')}}
                </div>
            @endif
    <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
            E-mail
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" value="{{old('email')}}" name="email" type="text" placeholder="E-mail">
        <span class="text-danger">@error('email') {{$message}} @enderror</span>
    </div>
    <div class="mb-6">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Password
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" name="password" type="password" placeholder="******************">
        <span class="text-danger">@error('password') {{$message}} @enderror</span>

        <p class="text-red text-xs italic">Please choose a password.</p>
    </div>
    <div class="flex items-center justify-between">
        <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">
            Sign In
        </button>
        <a class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-darker" href="#">
            Forgot Password?
        </a>
        <br><br>
        <a class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-darker" href="{{Route('register')}}">
            Create new account
        </a>
    </div>
    </form>
</div>
@endsection
