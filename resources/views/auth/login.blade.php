@extends('layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-64px)] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-gray-50">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Welcome back</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Please sign in to your account
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-[480px]">
            <div class="bg-white py-10 px-6 shadow-2xl shadow-gray-200/50 rounded-2xl sm:px-12 border border-gray-100">
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email address</label>
                        <div class="mt-2 relative rounded-md shadow-sm">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                   value="{{ old('email') }}"
                                   class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition duration-150">
                        </div>
                        @error('email') <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                        <div class="mt-2 relative rounded-md shadow-sm">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                   required
                                   class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition duration-150">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox"
                                   class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            <label for="remember" class="ml-2 block text-sm leading-6 text-gray-900">Remember me</label>
                        </div>

                        <div class="text-sm leading-6">
                            <a href="{{ route('password.request') }}"
                               class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="flex w-full justify-center rounded-xl bg-indigo-600 px-3 py-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-200 transform hover:translate-y-[-1px]">
                            Sign in
                        </button>
                    </div>
                </form>

                <div class="mt-8">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm font-medium leading-6">
                            <span class="bg-white px-6 text-gray-500">Or continue with</span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <a href="{{ route('social.redirect', 'google') }}"
                           class="flex w-full items-center justify-center gap-3 rounded-xl bg-white px-3 py-3 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:ring-transparent transition-colors">
                            <svg class="h-5 w-5" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"></path>
                            </svg>
                            <span class="text-sm font-semibold leading-6">Google</span>
                        </a>

                        <a href="{{ route('social.redirect', 'github') }}"
                           class="flex w-full items-center justify-center gap-3 rounded-xl bg-white px-3 py-3 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:ring-transparent transition-colors">
                            <svg class="h-5 w-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm font-semibold leading-6">GitHub</span>
                        </a>
                    </div>

                    <p class="mt-8 text-center text-sm text-gray-500">
                        Don't have an account?
                        <a href="{{ route('register') }}"
                           class="font-semibold text-indigo-600 hover:text-indigo-500 transition">Sign up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
