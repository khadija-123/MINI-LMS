<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Add New Teacher
        </h2>
    </x-slot>

    <div class="p-6" style="max-width: 800px;">
        <a href="{{ route('teachers.index') }}" class="underline text-blue-600">
            ← Back to Teachers
        </a>

        <br><br>

        <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <form action="{{ route('teachers.store') }}" method="POST">
                @csrf
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Full Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" 
                           style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px; font-size: 16px;" 
                           required>
                    @error('name')
                        <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Email Address *</label>
                    <input type="email" name="email" value="{{ old('email') }}" 
                           style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px; font-size: 16px;" 
                           required>
                    @error('email')
                        <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Phone Number *</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" 
                           style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px; font-size: 16px;" 
                           required>
                    @error('phone')
                        <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Department *</label>
                    <input type="text" name="department" value="{{ old('department') }}" 
                           style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px; font-size: 16px;" 
                           placeholder="e.g., Computer Science"
                           required>
                    @error('department')
                        <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" 
                        style="background-color: #2563eb; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer; font-weight: 600; font-size: 16px;">
                    Add Teacher
                </button>
                
                <a href="{{ route('teachers.index') }}" 
                   style="background-color: #6b7280; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; margin-left: 10px; font-weight: 600;">
                    Cancel
                </a>
            </form>
        </div>
    </div>
</x-app-layout>