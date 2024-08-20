<?php

namespace App\Jobs;

use App\Post;
use App\EmailQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostNotification;

class SendPostEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function handle()
    {
        $subscribers = $this->post->website->subscribers;

        foreach ($subscribers as $subscriber) {
            // Avoid sending duplicate emails
            if (!EmailQueue::where('post_id', $this->post->id)
                ->where('email', $subscriber->email)
                ->exists()) {
                EmailQueue::create([
                    'post_id' => $this->post->id,
                    'email' => $subscriber->email
                ]);
            }
        }

        $emails = EmailQueue::where('post_id', $this->post->id)
            ->where('sent', false)
            ->get();

        foreach ($emails as $emailQueue) {
            Mail::to($emailQueue->email)->send(new PostNotification($this->post));
            $emailQueue->update(['sent' => true]);
        }
    }
}
