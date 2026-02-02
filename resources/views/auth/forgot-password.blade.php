@extends('layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-64px)] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-gray-50">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Reset Password</h2>
            <p class="mt-2 text-center text-sm text-gray-600">Enter your email to receive instructions</p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-[480px]">
            <div class="bg-white py-10 px-6 shadow-2xl shadow-gray-200/50 rounded-2xl sm:px-12 border border-gray-100">
                @if (session('status'))
                    <div
                        class="mb-4 rounded-lg bg-green-50 p-4 text-sm font-medium text-green-700 border border-green-100">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" required
                                   class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <button type="submit"
                                class="flex w-full justify-center rounded-xl bg-indigo-600 px-3 py-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 transition-all duration-200">
                            Send Reset Link
                        </button>
                    </div>
                </form>
                <div class="mt-6 text-center">
                    <a href="{{ route('login') }}" class="font-semibold text-sm text-indigo-600 hover:text-indigo-500">Back
                        to Login</a>
                </div>
            </div>
        </div>
    </div>
@endsection
