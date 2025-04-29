@extends('layouts.global')

@section('content')

<div class="w-full h-full flex justify-center items-center">

     <div class="w-[500px] h-[350px] border border-black rounded-[30px] relative top-[-50px]">

          <form action="{{ route('verify.store') }}" method="POST" class="m-[20px] text-center flex flex-col items-center">

               @csrf

               <h1 class="text-[50px]">Email verification</h1>

               <div class="border border-green-400 bg-green-300 text-green-800 py-[10px] rounded-[10px] mt-[5px] w-[450px]">A verification code has been sent to your email address.<br>Please enter the code in the input field below to continue.</div>
          
               <input class="text-center border rounded-[10px] text-[25px] mt-[20px] w-[300px]" name="verificationCode" type="text" placeholder="XXX-XXX">

               <button class="text-white cursor-pointer bg-blue-600 mt-[40px] px-[40px] rounded-[10px] py-[5px] text-[20px]" type="submit">Submit</button>

          </form>

     </div>

</div>

@endsection