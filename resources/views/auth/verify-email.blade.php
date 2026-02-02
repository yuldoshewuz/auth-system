@extends('layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-64px)] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-gray-50">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-indigo-100">
                <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Verify your email</h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-[480px]">
            <div
                class="bg-white py-10 px-6 shadow-2xl shadow-gray-200/50 rounded-2xl sm:px-12 border border-gray-100 text-center">
                @if (session('status'))
                    <div
                        class="mb-4 rounded-lg bg-green-50 p-4 text-sm font-medium text-green-700 border border-green-100">
                        {{ session('status') }}
                    </div>
                @endif

                <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                    Please check your inbox to continue.
                </p>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                            class="flex w-full justify-center rounded-xl bg-indigo-600 px-3 py-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 transition-all duration-200">
                        Resend Verification Email
                    </button>
                </form>

                <div class="mt-6">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="text-sm font-medium text-gray-500 hover:text-gray-900 underline decoration-gray-300 underline-offset-4">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
