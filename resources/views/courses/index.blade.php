<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Courses
        </h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('dashboard') }}" class="underline text-blue-600">
            ← Back to Dashboard
        </a>

        <br><br>

        <a href="{{ route('courses.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Add Course
        </a>

        <div class="mt-6 space-y-3">
            @foreach($courses as $course)
                <div class="p-4 border rounded shadow-sm">
                    <h3 class="font-bold">{{ $course->title }}</h3>
                    <p class="text-gray-600">{{ $course->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
