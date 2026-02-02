@extends('layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-64px)] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-gray-50">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Create an account</h2>
            <p class="mt-2 text-center text-sm text-gray-600">Get started with your account</p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-[480px]">
            <div class="bg-white py-10 px-6 shadow-2xl shadow-gray-200/50 rounded-2xl sm:px-12 border border-gray-100">
                <form class="space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700">Full Name</label>
                        <div class="mt-2">
                            <input id="name" name="name" type="text" required value="{{ old('name') }}"
                                   class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition">
                        </div>
                        @error('name') <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" required value="{{ old('email') }}"
                                   class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition">
                        </div>
                        @error('email') <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" required
                                   class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition">
                        </div>
                        @error('password') <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">Confirm
                            Password</label>
                        <div class="mt-2">
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                   class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="flex w-full justify-center rounded-xl bg-indigo-600 px-3 py-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-200 transform hover:translate-y-[-1px]">
                            Register
                        </button>
                    </div>
                </form>
                <p class="mt-8 text-center text-sm text-gray-500">
                    Already registered?
                    <a href="{{ route('login') }}"
                       class="font-semibold text-indigo-600 hover:text-indigo-500 transition">Sign in</a>
                </p>
            </div>
        </div>
    </div>
@endsection
