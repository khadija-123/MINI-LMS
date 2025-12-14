<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Course
        </h2>
    </x-slot>

    <div class="p-6 max-w-2xl">
        <a href="{{ route('courses.index') }}" class="underline text-blue-600">
            ← Back to Courses
        </a>

        <br><br>

        <form action="{{ route('courses.update', $course->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium">Course Title</label>
                <input type="text" name="title" value="{{ $course->title }}" 
                       class="w-full border rounded px-3 py-2" required>
                @error('title')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-medium">Description</label>
                <textarea name="description" rows="4" 
                          class="w-full border rounded px-3 py-2" required>{{ $course->description }}</textarea>
                @error('description')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-medium">Instructor</label>
                <input type="text" name="instructor" value="{{ $course->instructor }}" 
                       class="w-full border rounded px-3 py-2" required>
                @error('instructor')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-medium">Duration (weeks)</label>
                <input type="number" name="duration" value="{{ $course->duration }}" 
                       class="w-full border rounded px-3 py-2" min="1" required>
                @error('duration')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Course
            </button>
        </form>
    </div>
</x-app-layout>