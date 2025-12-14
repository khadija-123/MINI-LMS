<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Teachers
        </h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('dashboard') }}" class="underline text-blue-600">
            ← Back to Dashboard
        </a>

        <br><br>

        @if(session('success'))
            <div style="background-color: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 12px; border-radius: 5px; margin-bottom: 16px;">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('teachers.create') }}"
           style="background-color: #2563eb; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
            + Add Teacher
        </a>

        <div style="margin-top: 24px;">
            @foreach($teachers as $teacher)
                <div style="background: white; padding: 20px; border: 2px solid #d1d5db; border-radius: 8px; margin-bottom: 16px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <h3 style="font-size: 20px; font-weight: bold; color: #1f2937; margin-bottom: 8px;">{{ $teacher->name }}</h3>
                    <p style="font-size: 14px; color: #374151;"><strong>Email:</strong> {{ $teacher->email }}</p>
                    <p style="font-size: 14px; color: #374151;"><strong>Phone:</strong> {{ $teacher->phone }}</p>
                    <p style="font-size: 14px; color: #374151; margin-bottom: 16px;"><strong>Department:</strong> {{ $teacher->department }}</p>
                    
                    <div style="display: flex; gap: 10px;">
                        <!-- Edit Button -->
                        <a href="{{ route('teachers.edit', $teacher->id) }}" 
                           style="background-color: #10b981; color: white; padding: 8px 16px; border-radius: 5px; text-decoration: none; font-weight: 600; display: inline-block;">
                            Edit
                        </a>
                        
                        <!-- Delete Button -->
                        <form action="{{ route('teachers.destroy', $teacher->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this teacher?');"
                              style="display: inline-block; margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    style="background-color: #ef4444; color: white; padding: 8px 16px; border-radius: 5px; border: none; cursor: pointer; font-weight: 600;">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>