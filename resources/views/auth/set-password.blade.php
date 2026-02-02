@extends('layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-64px)] flex flex-col justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="flex justify-center">
                <div class="p-3 bg-indigo-100 rounded-2xl">
                    <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 tracking-tight">One last step!</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Please set a password for your new account to keep it secure.
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-[440px]">
            <div class="bg-white py-10 px-6 shadow-2xl shadow-gray-200/50 rounded-3xl sm:px-12 border border-gray-100">
                <form class="space-y-6" action="{{ route('auth.set-password') }}" method="POST">
                    @csrf
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700">Create Password</label>
                        <div class="mt-2 relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input id="password" name="password" type="password" required
                                   class="block w-full rounded-xl border-0 py-3.5 pl-11 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                        </div>
                        @error('password') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">Confirm
                            Password</label>
                        <div class="mt-2 relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                   class="block w-full rounded-xl border-0 py-3.5 pl-11 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="flex w-full justify-center rounded-xl bg-indigo-600 px-4 py-4 text-sm font-bold text-white shadow-lg shadow-indigo-100 hover:bg-indigo-500 transition-all transform hover:-translate-y-0.5">
                            Complete Registration
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
