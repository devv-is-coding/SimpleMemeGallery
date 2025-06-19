@extends('base')

@section('title', 'Upload Meme')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Upload Meme</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
            <ul class="list-disc pl-4">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('storeMeme') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold">Title</label>
            <input type="text" name="title" required class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">URL (optional)</label>
            <input type="url" name="url" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Description</label>
            <textarea name="description" class="w-full border p-2 rounded"></textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Image</label>
            <input type="file" name="memeImage" accept="image/*" required class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Upload</button>
    </form>
</div>
@endsection
