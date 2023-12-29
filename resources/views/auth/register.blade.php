<!DOCTYPE html>
<html lang="en">
<x-head title="Регистрация"/>
<body>
<div class="flex flex-col justify-center items-center h-screen">
    <img class="w-1/6 mb-3" src="{{asset('assets/sberbank.svg')}}" alt="logo">
    <x-title
        color="green"
        text_size="text-4xl"
        margin_bottom="mb-3"
        text="Регистрация"
        alignment=""
    />
    <form class="flex flex-col gap-2" action="{{route('register_process')}}" method="POST">
        @csrf
        <x-input
            color="green"
            type="text"
            size="w-72"
            text_size=""
            name="name"
            placeholder="Name"
            :error_message="$message"
        />
        <x-input
            color="green"
            type="email"
            size="w-72"
            text_size=""
            name="email"
            placeholder="Email"
            :error_message="$message"
        />
        <x-input
            color="green"
            type="password"
            size="w-72"
            text_size=""
            name="password"
            placeholder="Password"
            :error_message="$message"
        />
        <x-button
            color="green"
            size="w-72"
            text="Зарегистрироваться"
            text_size="text-xl"
            alignment=""

        />
    </form>
    <div class="text-green-600 text-xl hover:underline">
        <a href="{{route('login')}}">
            Авторизоваться
        </a>
    </div>
</div>
</body>
</html>

