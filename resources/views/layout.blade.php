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

          <div class="w-[500px] h-[600px] rounded-[20px] border border-black-500 bg-white">
               <div class="p-[20px] w-full h-full text-center flex flex-col items-center">
                    <h1 class="text-[40px]">Sing in bruh</h1>

                    <label for="name" class="text-left w-90 ml-[20px] mt-3">user name</label>
                    <input id="name" class="border border-black rounded-[10px] w-90 mt-1 py-[5px] px-[10px]" type="text">
               </div>
          </div>

     </div>


</body>
</html>