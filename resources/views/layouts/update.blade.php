    @extends('base')

@section('title', 'Edit Meme')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Edit Meme</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
            <ul class="list-disc pl-4">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('updateMeme', $meme->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Title</label>
            <input type="text" name="title" value="{{ old('title', $meme->title) }}" required class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">URL (optional)</label>
            <input type="url" name="url" value="{{ old('url', $meme->url) }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Description</label>
            <textarea name="description" class="w-full border p-2 rounded">{{ old('description', $meme->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Current Image</label>
            <img src="{{ asset('storage/' . $meme->memeImage) }}" alt="Current Meme" class="rounded mb-2 max-w-full">
            <input type="file" name="memeImage" accept="image/*" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection
