@extends('Auth.layout')

@section('content')
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
    <form action="{{route('create')}}" method="Post">
        @csrf
        @method('head')
        <div class="results">
            @if(\Illuminate\Support\Facades\Session::get('success'))
            <div class="alert alert-success">
                {{\Illuminate\Support\Facades\Session::get('success')}}
            </div>

            @endif

                @if(\Illuminate\Support\Facades\Session::get('fail'))
                    <div class="alert alert-danger">
                        {{\Illuminate\Support\Facades\Session::get('fail')}}
                    </div>
                @endif

        </div>
        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="name" type="text" placeholder="Name" value="{{old('name')}}">
            <span class="text-danger">@error('name'){{$message}} @enderror</span>
        </div>

        <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
            E-mail
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="email" type="text" placeholder="E-mail" value="{{old('email')}}">
            <span class="text-danger">@error('email'){{$message}} @enderror</span>

        </div>
    <div class="mb-6">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Password
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" name="password" type="password" placeholder="******************">
        <span class="text-danger">@error('password'){{$message}} @enderror</span>

        <p class="text-red text-xs italic">Please choose a password.</p>
    </div>
    <div class="flex items-center justify-between">
        <button class="bg-blue hover:bg-blue-dark text-blue-600 font-bold py-2 px-4 rounded" type="submit">
            Register
        </button>

        <br><br>
        <a class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-darker" href="{{Route('login')}}">
           I Already have account
        </a>
    </div>
    </form>
</div>
@endsection
