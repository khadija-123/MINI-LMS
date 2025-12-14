<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Student
        </h2>
    </x-slot>

    <div class="p-6" style="max-width: 800px;">
        <a href="{{ route('students.index') }}" class="underline text-blue-600">
            ← Back to Students
        </a>

        <br><br>

        <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Full Name *</label>
                    <input type="text" name="name" value="{{ $student->name }}" 
                           style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px; font-size: 16px;" 
                           required>
                    @error('name')
                        <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Email Address *</label>
                    <input type="email" name="email" value="{{ $student->email }}" 
                           style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px; font-size: 16px;" 
                           required>
                    @error('email')
                        <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Phone Number *</label>
                    <input type="text" name="phone" value="{{ $student->phone }}" 
                           style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px; font-size: 16px;" 
                           required>
                    @error('phone')
                        <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Roll Number *</label>
                    <input type="text" name="roll_number" value="{{ $student->roll_number }}" 
                           style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px; font-size: 16px;" 
                           required>
                    @error('roll_number')
                        <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Program *</label>
                    <input type="text" name="program" value="{{ $student->program }}" 
                           style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 5px; font-size: 16px;" 
                           required>
                    @error('program')
                        <span style="color: #ef4444; font-size: 14px;">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" 
                        style="background-color: #2563eb; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer; font-weight: 600; font-size: 16px;">
                    Update Student
                </button>
                
                <a href="{{ route('students.index') }}" 
                   style="background-color: #6b7280; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; margin-left: 10px; font-weight: 600;">
                    Cancel
                </a>
            </form>
        </div>
    </div>
</x-app-layout>