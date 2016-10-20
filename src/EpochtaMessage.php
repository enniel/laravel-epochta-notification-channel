<?php

namespace NotificationChannels\Epochta;

class EpochtaMessage
{
    /**
     * @var array Params payload.
     */
    public $payload = [];

    /**
     * Message constructor.
     *
     * @param string $content
     */
    public function __construct($text = null)
    {
        $this->text($text);
    }

    /**
     * @param string $content
     *
     * @return static
     */
    public static function create($text = null)
    {
        return new static($text);
    }

    /**
     * The text of the message.
     *
     * @param $text
     *
     * @return $this
     */
    public function text($text)
    {
        $this->payload['text'] = $text;

        return $this;
    }

    /**
     * The identity of the sender.
     *
     * @param $sender
     *
     * @return $this
     */
    public function from($sender)
    {
        $this->payload['sender'] = $sender;

        return $this;
    }

    /**
     * Recipient's phone number.
     *
     * @param $phone
     *
     * @return $this
     */
    public function to($phone)
    {
        $this->payload['phone'] = $phone;

        return $this;
    }

    /**
     * Sending a message at a specified time.
     *
     * @param $datetime
     *
     * @return $this
     */
    public function at($datetime)
    {
        $this->payload['datetime'] = $datetime;

        return $this;
    }

    /**
     * Life time SMS (0 = maximum, 1, 6, 12, 24 hours).
     *
     * @param $lifetime
     *
     * @return $this
     */
    public function life($lifetime)
    {
        $this->payload['sms_lifetime'] = $lifetime;

        return $this;
    }

    /**
     * For Russia it is possible to specify the type of distribution type parameter.
     *
     * @param $type
     *
     * @return $this
     */
    public function type($type)
    {
        $this->payload['type'] = $type;

        return $this;
    }

    /**
     * Determine if phone number is not given.
     *
     * @return bool
     */
    public function toNotGiven()
    {
        return ! array_key_exists('phone', $this->payload);
    }

    /**
     * Returns params payload.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->payload;
    }
}
