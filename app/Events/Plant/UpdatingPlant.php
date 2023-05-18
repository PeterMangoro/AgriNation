<?php

namespace App\Events\Plant;

use App\Models\Plant;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UpdatingPlant
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public object $plant;
    /**
     * Create a new event instance.
     */
    public function __construct(public object $validated_request, public string $uuid)
    {
        $plant = Plant::whereUUIDmatches($uuid)->first();
        $this->validated_request = $validated_request;
        $this->plant = $plant;
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
