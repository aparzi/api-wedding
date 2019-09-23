<?php


namespace dto;


use JsonSerializable;

class Partecipazione implements JsonSerializable
{

    /**
     * @var string | null
     */
    private $fullname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $reply;

    /**
     * @var string | null
     */
    private $description;

    /**
     * Partecipazione constructor.
     * @param string|null $fullname
     * @param string $email
     * @param bool $reply
     * @param string|null $description
     */
    public function __construct(string $fullname, string $email, bool $reply, string $description)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->reply = $reply;
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getFullname(): string
    {
        return $this->fullname;
    }

    /**
     * @param string|null $fullname
     */
    public function setFullname(string $fullname)
    {
        $this->fullname = $fullname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return bool
     */
    public function isReply(): bool
    {
        return $this->reply;
    }

    /**
     * @param bool $reply
     */
    public function setReply(bool $reply)
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
            'email' => $this->email,
            'reply' => $this->reply,
            'description' => $this->description
        ];
    }
}