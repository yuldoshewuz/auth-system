@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="mb-10 text-center sm:text-left">
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Dashboard</h1>
            <p class="mt-2 text-gray-600">Welcome back, <span
                    class="font-semibold text-indigo-600">{{ Auth::user()->name }}</span>!</p>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 h-full">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-900">Project Information</h3>
                    <span class="flex h-3 w-3 relative">
                <span
                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-500"></span>
            </span>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center gap-4 p-3 rounded-lg bg-gray-50 border border-gray-100">
                        <div
                            class="h-12 w-12 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold text-xl shadow-inner">
                            F
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Developed by</p>
                            <p class="text-base font-bold text-gray-900">Fozilbek Yuldoshev</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-3">
                        <a href="https://github.com/yuldoshewuz/auth-system" target="_blank"
                           class="flex items-center justify-between p-3 rounded-xl border border-gray-200 hover:border-indigo-500 hover:bg-indigo-50 transition-all group">
                            <div class="flex items-center gap-3">
                                <i class="fab fa-github text-xl text-gray-700 group-hover:text-indigo-600"></i>
                                <span class="text-sm font-semibold text-gray-700">Project Source Code</span>
                            </div>
                            <i class="fas fa-external-link-alt text-xs text-gray-400"></i>
                        </a>

                        <a href="https://github.com/yuldoshewuz" target="_blank"
                           class="flex items-center justify-between p-3 rounded-xl border border-gray-200 hover:border-indigo-500 hover:bg-indigo-50 transition-all group">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-user-code text-xl text-gray-700 group-hover:text-indigo-600"></i>
                                <span class="text-sm font-semibold text-gray-700">Developer GitHub</span>
                            </div>
                            <i class="fas fa-external-link-alt text-xs text-gray-400"></i>
                        </a>

                        <a href="https://yuldoshew.uz" target="_blank"
                           class="flex items-center justify-between p-3 rounded-xl border border-gray-200 hover:border-indigo-500 hover:bg-indigo-50 transition-all group">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-globe text-xl text-gray-700 group-hover:text-indigo-600"></i>
                                <span class="text-sm font-semibold text-gray-700">Portfolio</span>
                            </div>
                            <i class="fas fa-external-link-alt text-xs text-gray-400"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
