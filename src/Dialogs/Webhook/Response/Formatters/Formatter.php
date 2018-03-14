<?php
declare(strict_types=1);

namespace Yandex\Dialogs\Webhook\Response\Formatters;

use Yandex\Dialogs\Webhook\Response\DTO\Response;

/**
 * Class Formatter
 *
 * @package Yandex\Dialogs\Webhook\Response\Formatters
 */
class Formatter
{
    /**
     * @param Response $response
     *
     * @return array
     */
    public static function toArray(Response $response): array
    {
        $buttons = [];
        foreach ($response->getButtons() as $btn) {
            $buttons[] = [
                'title' => $btn->getTitle(),
                'payload' => $btn->getPayload() ?? '',
                'url' => $btn->getUrl() ?? '',
                'hide' => $btn->isHide(),
            ];
        }

        return [
            'response' => [
                'text' => $response->getText(),
                'tts' => $response->getTts(),
            ],
            'buttons' => $buttons,
            'end_session' => $response->isEndSession(),
            'session' => [
                'session_id' => $response->getSession()->getSessionId(),
                'message_id' => $response->getSession()->getMessageId(),
                'user_id' => $response->getSession()->getUserId(),
            ],
            'version' => $response->getVersion(),
        ];
    }
}