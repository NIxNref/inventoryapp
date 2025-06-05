<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        $user = auth()->user();

        // Admin has all permissions
        if ($user->role === 'admin') {
            return $next($request);
        }

        // Check specific permissions for regular users
        switch ($permission) {
            case 'manage-categories':
                return $this->forbiddenResponse();

            case 'manage-assets':
                // Allow viewing all assets
                if ($request->isMethod('get')) {
                    return $next($request);
                }
                
                // For edit/delete, check if user owns the asset
                $asset = $request->route('asset');
                if ($asset && $asset->owner_id === $user->id) {
                    return $next($request);
                }
                return $this->forbiddenResponse();

            case 'manage-software':
                // Allow viewing all software
                if ($request->isMethod('get')) {
                    return $next($request);
                }
                
                // For edit/delete, check if user owns the software
                $software = $request->route('software');
                if ($software && $software->owner_id === $user->id) {
                    return $next($request);
                }
                return $this->forbiddenResponse();

            case 'manage-settings':
                // Only allow access to profile settings for regular users
                if (str_contains($request->path(), 'settings/profile')) {
                    return $next($request);
                }
                return $this->forbiddenResponse();

            default:
                return $this->forbiddenResponse();
        }
    }

    private function forbiddenResponse(): Response
    {
        return redirect()->back()->with('error', 'You do not have permission to perform this action.');
    }
} 