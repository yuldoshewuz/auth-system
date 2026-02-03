@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16">
        <div class="text-center mb-12">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">Account Settings</h1>
            <p class="mt-3 text-lg text-gray-600 max-w-2xl mx-auto">Manage your profile information and security
                preferences.</p>
        </div>

        <div class="space-y-8">
            <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/60 overflow-hidden border border-gray-100">
                <div class="p-6 sm:p-10">
                    <div
                        class="flex flex-col sm:flex-row items-center sm:space-x-8 mb-10 pb-10 border-b border-gray-100">
                        <div
                            class="h-24 w-24 rounded-3xl bg-gradient-to-tr from-indigo-500 to-violet-600 flex items-center justify-center text-white text-3xl font-bold shadow-2xl shadow-indigo-200 ring-4 ring-white mb-4 sm:mb-0">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="text-center sm:text-left">
                            <h2 class="text-2xl font-bold text-gray-900">{{ Auth::user()->name }}</h2>
                            <p class="text-gray-500 font-medium">{{ Auth::user()->email }}</p>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 mt-3 border border-emerald-100">
                            Verified Account
                        </span>
                        </div>
                    </div>

                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-y-8 gap-x-6 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <label for="name" class="block text-sm font-semibold leading-6 text-gray-900">Full
                                    Name</label>
                                <div class="mt-2 relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="name" id="name"
                                           value="{{ old('name', Auth::user()->name) }}"
                                           class="block w-full rounded-xl border-0 py-3.5 pl-11 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition duration-200">
                                </div>
                                @error('name') <p
                                    class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p> @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-sm font-semibold leading-6 text-gray-900">Email Address</label>
                                <div class="mt-2 relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <input type="email" disabled value="{{ Auth::user()->email }}"
                                           class="block w-full rounded-xl border-0 py-3.5 pl-11 text-gray-500 bg-gray-50 shadow-sm ring-1 ring-inset ring-gray-200 sm:text-sm sm:leading-6 cursor-not-allowed">
                                </div>
                            </div>
                        </div>

                        <div class="pt-8 border-t border-gray-100">
                            <h3 class="text-lg font-bold text-gray-900 flex items-center mb-6">
                                <svg class="h-5 w-5 text-indigo-600 mr-2" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                Security Settings
                            </h3>

                            <div class="grid grid-cols-1 gap-y-8 gap-x-6 sm:grid-cols-2">
                                <div class="sm:col-span-2">
                                    <label for="current_password"
                                           class="block text-sm font-semibold leading-6 text-gray-900">Current
                                        Password</label>
                                    <input type="password" name="current_password" id="current_password"
                                           placeholder="Required to change password"
                                           class="mt-2 block w-full rounded-xl border-0 py-3.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition duration-200">
                                    @error('current_password') <p
                                        class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-semibold leading-6 text-gray-900">New
                                        Password</label>
                                    <input type="password" name="password" id="password"
                                           class="mt-2 block w-full rounded-xl border-0 py-3.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition duration-200">
                                    @error('password') <p
                                        class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="password_confirmation"
                                           class="block text-sm font-semibold leading-6 text-gray-900">Confirm
                                        Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                           class="mt-2 block w-full rounded-xl border-0 py-3.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 transition duration-200">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end pt-6">
                            <button type="submit"
                                    class="rounded-xl bg-indigo-600 px-8 py-3.5 text-sm font-bold text-white shadow-lg shadow-indigo-200 hover:bg-indigo-500 hover:shadow-indigo-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-200 transform hover:-translate-y-0.5">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-red-50/50 rounded-3xl border border-red-100 p-8 sm:p-10" x-data="{ modalOpen: false }">
                <div class="sm:flex sm:items-start sm:justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-red-900">Delete Account</h3>
                        <p class="mt-2 text-sm text-red-700 max-w-xl">
                            Once your account is deleted, all of its resources and data will be permanently deleted.
                            Before deleting your account, please download any data or information that you wish to
                            retain.
                        </p>
                    </div>
                    <div class="mt-5 sm:mt-0 sm:ml-6 flex-shrink-0">
                        <button @click="modalOpen = true" type="button"
                                class="inline-flex items-center justify-center rounded-xl bg-red-600 px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 transition-colors">
                            Delete Account
                        </button>
                    </div>
                </div>

                <div x-show="modalOpen" class="relative z-50" aria-labelledby="modal-title" role="dialog"
                     aria-modal="true" style="display: none;">
                    <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                         x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity backdrop-blur-sm"></div>

                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                            <div x-show="modalOpen" @click.away="modalOpen = false"
                                 x-transition:enter="ease-out duration-300"
                                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                 x-transition:leave="ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                 class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                <form method="POST" action="{{ route('profile.destroy') }}" class="p-6">
                                    @csrf
                                    @method('DELETE')

                                    <div class="sm:flex sm:items-start">
                                        <div
                                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                            <h3 class="text-lg font-bold leading-6 text-gray-900" id="modal-title">
                                                Delete Account</h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500">Are you sure you want to delete your
                                                    account? This action cannot be undone. Please enter your password to
                                                    confirm.</p>
                                            </div>
                                            <div class="mt-4">
                                                <input type="password" name="password"
                                                       class="block w-full rounded-xl border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-600 sm:text-sm sm:leading-6"
                                                       placeholder="Password">
                                                @error('password', 'userDeletion')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                        <button type="submit"
                                                class="inline-flex w-full justify-center rounded-xl bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                            Delete Account
                                        </button>
                                        <button @click="modalOpen = false" type="button"
                                                class="mt-3 inline-flex w-full justify-center rounded-xl bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
