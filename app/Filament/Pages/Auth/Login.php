<?php

namespace App\Filament\Pages\Auth;
use Filament\Auth\Http\Responses\Contracts\LoginResponse;
use Filament\Notifications\Notification;
class Login extends \Filament\Auth\Pages\Login
{
    public function authenticate(): ?LoginResponse
    {
        $response = parent::authenticate();

        // If authentication succeeded, $response will not be null
        if ($response) {
            Notification::make()
                ->title('Login successful')
                ->body('Welcome back, ' . auth()->user()->name . '!')
                ->success()
                ->send();
        }

        return $response;
    }
}
