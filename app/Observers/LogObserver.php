<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;

class LogObserver
{
    public function creating($model): void
    {
        if (Auth::guard('admin')->check()) {
            $model->created_by = Auth::guard('admin')->id();
        }
    }

    public function updating($model): void
    {
        if (Auth::guard('admin')->check()) {
            $model->updated_by = Auth::guard('admin')->id();
        }
    }

    public function deleting($model): void
    {
        if (Auth::guard('admin')->check()) {
            $model->updated_by = Auth::guard('admin')->id();
            // Save quietly to avoid triggering another update event
            $model->saveQuietly();
        }
    }

    protected function logAction(string $actionType, $model): void
    {
        // Log::create([
        //     'action_type' => $actionType,
        //     'action_desc' => $model->toArray(),
        //     'created_by'  => Auth::guard('admin')->id(),
        // ]);
    }
}
