@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-green-50 flex items-center justify-center p-6">
    <div class="w-full max-w-md">

        <!-- Header -->
        <div class="text-center mb-8">
            <div class="mx-auto mb-4 flex justify-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                    <span class="text-3xl">💊</span>
                </div>
            </div>
            <h1 class="text-2xl font-bold text-green-700">Wijaya Farma</h1>
            <p class="text-gray-500 text-sm">Apotek & Layanan Kesehatan</p>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-xl shadow-md p-6">

            <h2 class="text-xl font-semibold text-gray-700 text-center mb-6">
                Login Admin
            </h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Username -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">Username</label>
                    <input 
                        type="text" 
                        name="username" 
                        value="{{ old('username') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none"
                        placeholder="Masukkan username"
                        required
                    >
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-600 mb-1">Password</label>
                    <input 
                        type="password" 
                        name="password"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none"
                        placeholder="Masukkan password"
                        required
                    >
                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between text-sm mb-4">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="remember">
                        <span class="text-gray-600">Ingat saya</span>
                    </label>

                    <a href="{{ route('password.request') }}" class="text-green-600 hover:underline">
                        Lupa password?
                    </a>
                </div>

                <!-- Button -->
                <button 
                    type="submit"
                    class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition"
                >
                    Login
                </button>
            </form>
        </div>

        <!-- Footer -->
        <p class="text-center text-gray-400 text-sm mt-6">
            © 2026 Wijaya Farma
        </p>
    </div>
</div>
@endsection