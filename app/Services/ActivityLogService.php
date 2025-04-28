<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ActivityLogService
{
    public static function log($userId = null, $model, $actionType, $message = null)
    {
        ActivityLog::create([
            'user_id' => $userId ?? Auth::id(),
            'module' => class_basename($model),
            'action_type' => $actionType,
            'loggable_type' => get_class($model),
            'loggable_id' => $model->id,
            'message' => $message,
            'ip_address' => Request::ip(),
            'user_agent' => Request::header('User-Agent'),
        ]);
    }


}
