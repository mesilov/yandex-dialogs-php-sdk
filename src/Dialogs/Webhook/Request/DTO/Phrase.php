<?php
declare(strict_types=1);

namespace Yandex\Dialogs\Webhook\Request\DTO;

/**
 * Class Phrase
 * Фраза, полученная от пользователя.
 *
 * @package Yandex\Dialogs\Webhook\Request\DTO
 */
class Phrase
{
    /**
     * @var string Тип ввода:
     *  SimpleUtterance — голосовой ввод;
     *  ButtonPressed — нажатие кнопки.
     */
    protected $type;
    /**
     * @var string Текст пользовательского запроса без активационных фраз Алисы и конкретного навыка.
     */
    protected $command;
    /**
     * @var string Полный текст пользовательского запроса.
     */
    protected $originalUtterance;
    /**
     * @var string JSON, полученный с нажатой кнопкой от обработчика навыка (в ответе на предыдущий запрос).
     */
    protected $payload;
    /**
     * @var array Формальные характеристики реплики, которые удалось выделить Яндекс.Диалогам. Отсутствует, если ни одно из вложенных свойств не применимо.
     */
    protected $markup;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Phrase
     */
    public function setType(string $type): Phrase
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @param string $command
     *
     * @return Phrase
     */
    public function setCommand(string $command): Phrase
    {
        $this->command = $command;

        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalUtterance(): string
    {
        return $this->originalUtterance;
    }

    /**
     * @param string $originalUtterance
     *
     * @return Phrase
     */
    public function setOriginalUtterance(string $originalUtterance): Phrase
    {
        $this->originalUtterance = $originalUtterance;

        return $this;
    }

    /**
     * @return string
     */
    public function getPayload(): string
    {
        return $this->payload;
    }

    /**
     * @param string $payload
     *
     * @return Phrase
     */
    public function setPayload(string $payload): Phrase
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * @return array
     */
    public function getMarkup(): array
    {
        return $this->markup;
    }

    /**
     * @param array $markup
     *
     * @return Phrase
     */
    public function setMarkup(array $markup): Phrase
    {
        $this->markup = $markup;

        return $this;
    }
}