<!DOCTYPE html>
<html lang="en">
<x-head title="Авторизация"/>
<body>
<div class="flex flex-col justify-center items-center h-screen">
    <img class="w-1/6 mb-3" src="{{asset('assets/sberbank.svg')}}" alt="logo">
    <div class="text-green-600 text-4xl mb-3">
        Авторизация
    </div>
    <form class="flex flex-col gap-2 mb-2" action="{{route('login_process')}}" method="post">
        @csrf
        <input class="border border-green-600 w-72 p-2 rounded-md text-green-600 placeholder-green-400 @error('email') border-red-600 @enderror focus:outline-none focus:border-green-600"
               type="email"
               name="email"
               placeholder="Email"
               value="{{old('email')}}"
        >
        @error('email')
            <p class="text-red-600 text-xl w-72">{{$message}}</p>
        @enderror
        <input class="border border-green-600 w-72 p-2 rounded-md text-green-600 placeholder-green-400 @error('password') border-red-600 @enderror focus:outline-none focus:border-green-600"
               type="password"
               placeholder="Password"
               name="password"
        >
        @error('password')
            <p class="text-red-600 text-xl w-72">{{$message}}</p>
        @enderror
        <button class="border border-green-600 w-72 p-2 rounded-md text-white bg-green-600 text-xl hover:bg-green-500"
                type="submit"
        >
            Войти
        </button>
    </form>
    <div class="text-green-600 text-xl hover:underline">
        <a href="{{route('register')}}">
            Зарегистрироваться
        </a>
    </div>
</div>
</body>
</html>
