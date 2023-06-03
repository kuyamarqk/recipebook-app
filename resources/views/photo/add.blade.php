@extends('user.dashboard')

@section('photos_add')
    <h1 class="text-2xl font-bold mb-4">Add New Photo for {{ $recipe->name }}</h1>

    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="photo">
                Photo
            </label>
            <input type="hidden" name="recipe_id" value={{ $recipe->id }}>
            <input type="file" name="photo" id="photo" class="border border-gray-300 py-2 px-3 rounded-lg">
            @error('photo')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <img id="photoPreview" class="preview hidden">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Upload
        </button>
    </form>
    <script>
        function previewPhoto(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            const photoPreview = document.getElementById('photoPreview');

            reader.onload = function(e) {
                photoPreview.src = e.target.result;
                photoPreview.classList.remove('hidden');
            }

            reader.readAsDataURL(file);
        }
    </script>
@endsection


