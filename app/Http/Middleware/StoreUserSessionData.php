<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StoreUserSessionData
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (auth()->check()) {
            $user = auth()->user();
            
            // Always update session data on each request when authenticated
            // But only increment counter on actual new login
            
            if (!session()->has('username')) {
                // This is a fresh login - increment counter
                
                // Get stored login count from database or session storage
                $loginCount = $this->getStoredLoginCount($user->id) + 1;
                $this->storeLoginCount($user->id, $loginCount);
                
                session(['login_count' => $loginCount]);
                session(['last_login' => now()->format('Y-m-d H:i:s')]);
                session(['username' => $user->name]);
                session(['role' => 'Student']);
                
                // Create user data array and convert to JSON
                $userData = [
                    'course' => 'Web Engineering',
                    'semester' => '7th',
                    'year' => '2024-2025'
                ];
                
                session(['user_data_json' => json_encode($userData)]);
            }
        }
        
        return $next($request);
    }
    
    /**
     * Get stored login count from cache/file
     */
    private function getStoredLoginCount($userId)
    {
        $filePath = storage_path('app/login_counts.json');
        
        if (file_exists($filePath)) {
            $data = json_decode(file_get_contents($filePath), true);
            return $data[$userId] ?? 0;
        }
        
        return 0;
    }
    
    /**
     * Store login count to cache/file
     */
    private function storeLoginCount($userId, $count)
    {
        $filePath = storage_path('app/login_counts.json');
        
        $data = [];
        if (file_exists($filePath)) {
            $data = json_decode(file_get_contents($filePath), true);
        }
        
        $data[$userId] = $count;
        file_put_contents($filePath, json_encode($data));
    }
}