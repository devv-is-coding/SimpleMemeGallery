@extends('base')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto mt-10 px-4">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-4xl font-bold text-gray-800">📋 Dashboard</h1>

        <div class="flex items-center gap-4">
            <a href="{{ route('createMeme') }}"
               class="bg-green-600 text-white px-5 py-2 rounded-lg font-semibold shadow hover:bg-green-700 transition">
                + Upload Meme
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="bg-red-600 text-white px-5 py-2 rounded-lg font-semibold shadow hover:bg-red-700 transition">
                    Logout
                </button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-6 shadow">
            {{ session('success') }}
        </div>
    @endif

    @if($memes->isEmpty())
        <div class="text-center text-gray-600 text-lg py-10">
            No memes uploaded yet. Try uploading one!
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($memes as $meme)
                <div class="bg-white border rounded-lg p-4 shadow hover:shadow-md transition">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $meme->title }}</h2>

                    @if($meme->url)
                        <a href="{{ $meme->url }}" target="_blank" class="text-blue-500 hover:underline text-sm">
                            Source
                        </a>
                    @endif

                    <p class="text-sm text-gray-600 mt-1">{{ $meme->description }}</p>

                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $meme->memeImage) }}" alt="Meme Image"
                             class="rounded w-full object-cover max-h-64">
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <a href="{{ route('editMeme', $meme->id) }}"
                           class="text-blue-600 hover:underline font-medium">Edit</a>

                        <form action="{{ route('deleteMeme', $meme->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this meme?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline font-medium">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
