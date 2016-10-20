<?php

namespace NotificationChannels\Epochta;

use Psr\Http\Message\ResponseInterface;

class MessageWasSended
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    public $response;

    /**
     * @var object
     */
    public $notifiable;

    /**
     * @param  \Psr\Http\Message\ResponseInterface  $response
     * @return void
     */
    public function __construct(ResponseInterface $response, $notifiable)
    {
        $this->response = $response;
        $this->notifiable = $notifiable;
    }
}
