<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Add Course
        </h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('courses.index') }}" class="underline text-blue-600">
            ← Back to Courses
        </a>

        <form method="POST" action="{{ route('courses.store') }}" class="mt-6">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">Course Title</label>
                <input type="text" name="title"
                       class="border rounded w-full p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Description</label>
                <textarea name="description"
                          class="border rounded w-full p-2" required></textarea>
            </div>

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Save Course
            </button>
        </form>
    </div>
</x-app-layout>
