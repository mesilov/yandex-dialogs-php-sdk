<?php
declare(strict_types=1);

namespace Yandex\Dialogs\Webhook\Response;

use Yandex\Dialogs\Webhook\Response\DTO\Response;
use Yandex\Dialogs\Webhook\Response\DTO\Session;
use Yandex\Dialogs\Webhook\Response\DTO\Buttons\Collection;
use Yandex\Dialogs\Webhook\Response\DTO\Buttons\Button;
use Yandex\Dialogs\Webhook\Request\DTO\Request;

/**
 * Class Fabric
 *
 * @package Yandex\Dialogs\Webhook\Response
 */
class Fabric
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var string Ответ в формате TTS (text-to-speech), максимум 1024 символа.
     * @see https://tech.yandex.ru/dialogs/alice/doc/speech-tuning-docpage/#speech-tuning
     */
    protected $tts;

    /**
     * @var string Текст, который следует показать пользователю, максимум 1024 символа. Обязательное свойство.
     */
    protected $text;

    /**
     * @var  Collection  Кнопки, которые следует показать пользователю. Кнопки можно использовать как ссылки или подсказки для реплик.
     */
    protected $buttons;

    /**
     * @var bool Признак конца разговора. Обязательное свойство.
     * Допустимые значения:
     * false — сессию следует продолжить;
     * true — сессию следует завершить.
     */
    protected $isEndSession;

    /**
     * Fabric constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->isEndSession = false;
        $this->tts = '';
        $this->buttons = new Collection();
    }

    /**
     * @param string $text Текст, который следует показать пользователю, максимум 1024 символа. Обязательное свойство.
     *
     * @return Fabric
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @param string $tts Ответ в формате TTS (text-to-speech), максимум 1024 символа.
     *
     * @return Fabric
     */
    public function setTts(string $tts): self
    {
        $this->tts = $tts;

        return $this;
    }

    /**
     * Признак конца разговора. Обязательное свойство.
     *
     * @return Fabric
     */
    public function endSession(): self
    {
        $this->isEndSession = true;

        return $this;
    }

    /**
     * добавить кнопку
     *
     * @param Button $button
     *
     * @return Fabric
     */
    public function addButton(Button $button): self
    {
        $this->buttons->attach($button);

        return $this;
    }

    /**
     * @return Response
     */
    public function buildResponse(): Response
    {
        $session = new Session();
        $session
            ->setSessionId($this->request->getSession()->getSessionId())
            ->setUserId($this->request->getSession()->getUserId())
            ->setMessageId($this->request->getSession()->getMessageId());

        $response = new Response();
        $response
            ->setVersion($this->request->getVersion())
            ->setText($this->text)
            ->setTts($this->tts)
            ->setIsEndSession($this->isEndSession)
            ->setButtons($this->buttons)
            ->setSession($session);

        return $response;
    }
}