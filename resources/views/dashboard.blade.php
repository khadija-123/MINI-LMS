<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Session Information Card -->
            <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 30px;">
                <h2 style="font-size: 24px; font-weight: bold; color: #1f2937; margin-bottom: 20px; border-bottom: 2px solid #667eea; padding-bottom: 10px;">
                    📋 Session Information
                </h2>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px;">
                    <div style="background: #f3f4f6; padding: 15px; border-radius: 8px;">
                        <p style="font-size: 14px; color: #6b7280; margin-bottom: 5px;">Username</p>
                        <p style="font-size: 18px; font-weight: bold; color: #1f2937;">{{ session('username', 'N/A') }}</p>
                    </div>
                    
                    <div style="background: #f3f4f6; padding: 15px; border-radius: 8px;">
                        <p style="font-size: 14px; color: #6b7280; margin-bottom: 5px;">Role</p>
                        <p style="font-size: 18px; font-weight: bold; color: #1f2937;">{{ session('role', 'N/A') }}</p>
                    </div>
                    
                    <div style="background: #f3f4f6; padding: 15px; border-radius: 8px;">
                        <p style="font-size: 14px; color: #6b7280; margin-bottom: 5px;">Login Count</p>
                        <p style="font-size: 18px; font-weight: bold; color: #1f2937;">{{ session('login_count', 0) }}</p>
                    </div>
                    
                    <div style="background: #f3f4f6; padding: 15px; border-radius: 8px;">
                        <p style="font-size: 14px; color: #6b7280; margin-bottom: 5px;">Last Login</p>
                        <p style="font-size: 18px; font-weight: bold; color: #1f2937;">{{ session('last_login', 'N/A') }}</p>
                    </div>
                </div>
                
                <!-- JSON Data Display -->
                <div style="margin-top: 20px; background: #f9fafb; padding: 20px; border-radius: 8px; border: 2px solid #e5e7eb;">
                    <h3 style="font-size: 18px; font-weight: bold; color: #1f2937; margin-bottom: 15px;">
                        🔍 JSON Data (Course Information)
                    </h3>
                    
                    @if(session('user_data_json'))
                        @php
                            $userData = json_decode(session('user_data_json'), true);
                        @endphp
                        
                        <div style="background: #1f2937; color: #10b981; padding: 15px; border-radius: 5px; font-family: 'Courier New', monospace; margin-bottom: 15px;">
                            <strong>Raw JSON:</strong><br>
                            {{ session('user_data_json') }}
                        </div>
                        
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                            <div style="background: white; padding: 15px; border-radius: 8px; border-left: 4px solid #667eea;">
                                <p style="font-size: 14px; color: #6b7280; margin-bottom: 5px;">Course</p>
                                <p style="font-size: 16px; font-weight: bold; color: #1f2937;">{{ $userData['course'] ?? 'N/A' }}</p>
                            </div>
                            
                            <div style="background: white; padding: 15px; border-radius: 8px; border-left: 4px solid #f5576c;">
                                <p style="font-size: 14px; color: #6b7280; margin-bottom: 5px;">Semester</p>
                                <p style="font-size: 16px; font-weight: bold; color: #1f2937;">{{ $userData['semester'] ?? 'N/A' }}</p>
                            </div>
                            
                            <div style="background: white; padding: 15px; border-radius: 8px; border-left: 4px solid #00f2fe;">
                                <p style="font-size: 14px; color: #6b7280; margin-bottom: 5px;">Year</p>
                                <p style="font-size: 16px; font-weight: bold; color: #1f2937;">{{ $userData['year'] ?? 'N/A' }}</p>
                            </div>
                        </div>
                    @else
                        <p style="color: #6b7280;">No JSON data found in session. Please log out and log in again.</p>
                    @endif
                </div>
            </div>

            <!-- Welcome Section -->
            <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 30px;">
                <h1 style="font-size: 28px; font-weight: bold; color: #1f2937; text-align: center; margin-bottom: 10px;">
                    Welcome to Mini LMS
                </h1>
                <p style="text-align: center; color: #6b7280; font-size: 16px;">
                    Your Complete Learning Management System
                </p>
            </div>

            <!-- Statistics Cards -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                <!-- Courses Card -->
                <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 30px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center; color: white;">
                    <h3 style="font-size: 48px; font-weight: bold; margin-bottom: 10px;">
                        {{ App\Models\Course::count() }}
                    </h3>
                    <p style="font-size: 18px; font-weight: 500;">Total Courses</p>
                    <a href="{{ route('courses.index') }}" 
                       style="display: inline-block; margin-top: 15px; background: white; color: #667eea; padding: 8px 20px; border-radius: 5px; text-decoration: none; font-weight: 600;">
                        View Courses
                    </a>
                </div>

                <!-- Teachers Card -->
                <div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); padding: 30px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center; color: white;">
                    <h3 style="font-size: 48px; font-weight: bold; margin-bottom: 10px;">
                        {{ App\Models\Teacher::count() }}
                    </h3>
                    <p style="font-size: 18px; font-weight: 500;">Total Teachers</p>
                    <a href="{{ route('teachers.index') }}" 
                       style="display: inline-block; margin-top: 15px; background: white; color: #f5576c; padding: 8px 20px; border-radius: 5px; text-decoration: none; font-weight: 600;">
                        View Teachers
                    </a>
                </div>

                <!-- Students Card -->
                <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); padding: 30px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center; color: white;">
                    <h3 style="font-size: 48px; font-weight: bold; margin-bottom: 10px;">
                        {{ App\Models\Student::count() }}
                    </h3>
                    <p style="font-size: 18px; font-weight: 500;">Total Students</p>
                    <a href="{{ route('students.index') }}" 
                       style="display: inline-block; margin-top: 15px; background: white; color: #00f2fe; padding: 8px 20px; border-radius: 5px; text-decoration: none; font-weight: 600;">
                        View Students
                    </a>
                </div>
            </div>

            <!-- Quick Actions -->
            <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-top: 30px;">
                <h2 style="font-size: 20px; font-weight: bold; color: #1f2937; margin-bottom: 15px;">Quick Actions</h2>
                <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                    <a href="{{ route('courses.create') }}" 
                       style="background-color: #2563eb; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: 600;">
                        + Add Course
                    </a>
                    <a href="{{ route('teachers.create') }}" 
                       style="background-color: #10b981; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: 600;">
                        + Add Teacher
                    </a>
                    <a href="{{ route('students.create') }}" 
                       style="background-color: #f59e0b; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: 600;">
                        + Add Student
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>