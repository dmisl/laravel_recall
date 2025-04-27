@extends('layouts.global')

@section('content')

<div class="w-full h-full flex justify-center items-center">

    <div class="flex gap-[20px] items-center">

        <form action="{{ route('login.store') }}" method="POST" class="w-[500px] h-[400px] rounded-[20px] border border-black-500 bg-white">
    
            @csrf
    
            <div class="p-[20px] w-full h-full text-center flex flex-col items-center">
                <h1 class="text-[40px]">Sing in bruh</h1>
    
                <label for="name" class="text-left text-[25px] w-90 ml-[20px] mt-3">user name</label>
                <input name="name" id="name" class="border border-black rounded-[10px] w-90 py-[5px] px-[10px]" type="text">
    
                <label for="password" class="text-left text-[25px] w-90 ml-[20px] mt-3">password</label>
                <input name="password" id="password" class="border border-black rounded-[10px] w-90 py-[5px] px-[10px]" type="password">
    
                <button type="submit" role="button" class="cursor-pointer mt-[20px] text-[20px] rounded-[30px] border border-black bg-blue-700 text-white px-[40px] py-[5px] pt-[2px]">
                    <p class="relative top-[3px]">log in</p>
                </button>
    
                <a href="{{ route('reset.index') }}" class="text-blue-800 underline mt-2">forgot the password?</a>
    
            </div>
        </form>

        <p>or</p>

        <form action="{{ route('register.store') }}" method="POST" class="w-[500px] h-[500px] border border-black rounded-[20px]">

            @csrf

            <div class="text-center flex flex-col items-center p-[20px]">

                <h1 class="text-[40px]">Sing up bruh</h1>

                <label for="reg_name" class="text-left text-[25px] w-90 ml-[20px] mt-1">user name</label>
                <input name="name" id="reg_name" class="border border-black rounded-[10px] w-90 py-[5px] px-[10px]" type="text">

                <label for="reg_email" class="text-left text-[25px] w-90 ml-[20px] mt-1">email</label>
                <input name="email" id="reg_email" class="border border-black rounded-[10px] w-90 py-[5px] px-[10px]" type="email">

                <label for="reg_password" class="text-left text-[25px] w-90 ml-[20px] mt-1">password</label>
                <input name="password" id="reg_password" class="border border-black rounded-[10px] w-90 py-[5px] px-[10px]" type="password">

                <label for="reg_password_confirmation" class="text-left text-[25px] w-90 ml-[20px] mt-1">password confirmation</label>
                <input name="password_confirmation" id="reg_password_confirmation" class="border border-black rounded-[10px] w-90 py-[5px] px-[10px]" type="password">

                <button type="submit" role="button" class="cursor-pointer mt-[20px] text-[20px] rounded-[30px] border border-black bg-blue-700 text-white px-[40px] py-[5px] pt-[2px]">
                    <p class="relative top-[3px]">sign up</p>
                </button>
                
            </div>

        </form>

    </div>


</div>

@endsection