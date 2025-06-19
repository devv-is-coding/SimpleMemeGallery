@extends('base')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white p-8 rounded shadow-md">
        <h1 class="text-2xl font-bold text-center mb-6">Admin Login</h1>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('loginUser') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block font-semibold mb-1">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="{{ old('email') }}"
                    required 
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="user@me.com"
                >
            </div>

            <div>
                <label for="password" class="block font-semibold mb-1">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="••••••••"
                >
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Login
            </button>
        </form>
    </div>
</div>
@endsection
