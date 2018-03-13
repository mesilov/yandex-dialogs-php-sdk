<?php
declare(strict_types=1);

namespace Yandex\Dialogs\Webhook\Request\DTO;

/**
 * Class Request
 *
 * @package Yandex\Dialogs\Webhook\Request\DTO
 */
class Request
{
    /**
     * @var string Версия протокола.
     */
    protected $version;
    /**
     * @var Meta
     */
    protected $meta;
    /**
     * @var Phrase
     */
    protected $phrase;
    /**
     * @var Session
     */
    protected $session;

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     *
     * @return Request
     */
    public function setVersion(string $version): Request
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return Meta
     */
    public function getMeta(): Meta
    {
        return $this->meta;
    }

    /**
     * @param Meta $meta
     *
     * @return Request
     */
    public function setMeta(Meta $meta): Request
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return Phrase
     */
    public function getPhrase(): Phrase
    {
        return $this->phrase;
    }

    /**
     * @param Phrase $phrase
     *
     * @return Request
     */
    public function setPhrase(Phrase $phrase): Request
    {
        $this->phrase = $phrase;

        return $this;
    }

    /**
     * @return Session
     */
    public function getSession(): Session
    {
        return $this->session;
    }

    /**
     * @param Session $session
     *
     * @return Request
     */
    public function setSession(Session $session): Request
    {
        $this->session = $session;

        return $this;
    }
}