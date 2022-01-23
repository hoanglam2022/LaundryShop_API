<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetRequest extends Notification implements ShouldQueue {
	use Queueable;
	protected $token;

	//  Create a new notification instance.
	public function __construct($token) {
		$this->token = $token;
	}

	// Get the notification's delivery channels.
	public function via($notifiable) {
		return ['mail'];
	}

	// Get the mail representation of the notification.
	public function toMail($notifiable) {
		$url = config('app.url_frontend') . '/password/find/' . $this->token;

		return (new MailMessage)
			->line('You are receiving this email because we received a password reset request for your account.')
			->action('Reset Password', $url)
			->line('If you did not request a password reset, no further action is required');
	}

	// Get the array representation of the notification.
	public function toArray($notifiable) {
		return [
			//
		];
	}
}
