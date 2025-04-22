<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
     
     <div class="w-full h-screen flex justify-center items-center">

          <form method="POST" class="w-[500px] h-[400px] rounded-[20px] border border-black-500 bg-white">
               <div class="p-[20px] w-full h-full text-center flex flex-col items-center">
                    <h1 class="text-[40px]">Sing in bruh</h1>

                    <label for="name" class="text-left text-[25px] w-90 ml-[20px] mt-3">user name</label>
                    <input name="name" id="name" class="border border-black rounded-[10px] w-90 py-[5px] px-[10px]" type="text">

                    <label for="password" class="text-left text-[25px] w-90 ml-[20px] mt-3">password</label>
                    <input name="password" id="password" class="border border-black rounded-[10px] w-90 py-[5px] px-[10px]" type="password">

                    <button class="mt-10 text-[20px] rounded-[30px] border border-black bg-blue-700 text-white px-[40px] py-[5px] pt-[2px]">log in</button>

                    <a href="{{ route('restore') }}" class="text-blue-800 underline mt-2">forgot the password?</a>

               </div>
          </form>

     </div>


</body>
</html>