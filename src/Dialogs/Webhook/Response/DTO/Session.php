<?php
declare(strict_types=1);

namespace Yandex\Dialogs\Webhook\Response\DTO;
/**
 * Class Session
 * Данные о сессии.
 *
 * @package Yandex\Dialogs\Webhook\Response\DTO
 */
class Session
{
    /**
     * @var string Уникальный идентификатор сессии, 64 байта.
     */
    protected $sessionId;
    /**
     * @var int Идентификатор сообщения в рамках сессии. Инкрементируется с каждым следующим запросом.
     */
    protected $messageId;
    /**
     * @var string Обфусцированный идентификатор пользователя.
     */
    protected $userId;

    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    /**
     * @param string $sessionId
     *
     * @return Session
     */
    public function setSessionId(string $sessionId): Session
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     *
     * @return Session
     */
    public function setMessageId(int $messageId): Session
    {
        $this->messageId = $messageId;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     *
     * @return Session
     */
    public function setUserId(string $userId): Session
    {
        $this->userId = $userId;

        return $this;
    }
}