<?php


namespace dto;


use JsonSerializable;

class Result implements JsonSerializable
{

    /**
     * @var boolean
     */
    private $esito;

    /**
     * @var string
     */
    private $messaggio;

    /**
     * Result constructor.
     * @param bool $esito
     * @param string $messaggio
     */
    public function __construct(bool $esito, string $messaggio)
    {
        $this->esito = $esito;
        $this->messaggio = $messaggio;
    }

    /**
     * @return bool
     */
    public function isEsito(): bool
    {
        return $this->esito;
    }

    /**
     * @param bool $esito
     */
    public function setEsito(bool $esito)
    {
        $this->esito = $esito;
    }

    /**
     * @return string
     */
    public function getMessaggio(): string
    {
        return $this->messaggio;
    }

    /**
     * @param string $messaggio
     */
    public function setMessaggio(string $messaggio)
    {
        $this->messaggio = $messaggio;
    }


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'esito' => $this->esito,
            'messaggio' => $this->messaggio
        ];
    }
}