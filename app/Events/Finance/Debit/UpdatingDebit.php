<?php

namespace App\Events\Finance\Debit;

use App\Models\Finance\Debit;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UpdatingDebit
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public object $debit;
    /**
     * Create a new event instance.
     */
    public function __construct(public object $validated_request, public string $uuid)
    {
        $debit = Debit::whereUUIDmatches($uuid)->first();
        $this->validated_request = $validated_request;
        $this->debit = $debit;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
