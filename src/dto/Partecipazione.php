<?php


namespace dto;


use JsonSerializable;

class Partecipazione implements JsonSerializable
{

    /**
     * @var string
     */
    private $fullname;

    /**
     * @var string
     */
    private $reply;

    /**
     * @var string | null
     */
    private $description;

    /**
     * Partecipazione constructor.
     * @param string $fullname
     * @param bool $reply
     * @param string|null $description
     */
    public function __construct(string $fullname, string $reply, string $description)
    {
        $this->fullname = $fullname;
        $this->reply = $reply;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getFullname(): string
    {
        return $this->fullname;
    }

    /**
     * @param string $fullname
     */
    public function setFullname(string $fullname)
    {
        $this->fullname = $fullname;
    }

    /**
     * @return string
     */
    public function getReply(): string
    {
        return $this->reply;
    }

    /**
     * @param string $reply
     */
    public function setReply(string $reply): void
    {
        $this->reply = $reply;
    }

    /**
     * @return string|null
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return array
     *
     */
    public function jsonSerialize()
    {
        return [
            'fullname' => $this->fullname,
            'reply' => $this->reply,
            'description' => $this->description
        ];
    }
}