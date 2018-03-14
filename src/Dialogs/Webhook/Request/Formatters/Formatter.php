<?php
declare(strict_types=1);

namespace Yandex\Dialogs\Webhook\Request\Formatters;

use Yandex\Dialogs;

/**
 * Class Formatter
 *
 * @package Yandex\Dialogs\Webhook\Request\Formatters
 */
class Formatter
{
    /**
     * @param Dialogs\Webhook\Request\DTO\Request $request
     *
     * @return array
     */
    public static function toArray(Dialogs\Webhook\Request\DTO\Request $request): array
    {
        return [
            'meta' => [
                'client_id' => $request->getMeta()->getClientId(),
                'locale' => $request->getMeta()->getLocale(),
                'timezone' => $request->getMeta()->getTimezone()->getName(),
            ],
            'request' => [
                'command' => $request->getPhrase()->getCommand(),
                'original_utterance' => $request->getPhrase()->getOriginalUtterance(),
                'type' => $request->getPhrase()->getType(),
            ],
            'session' => [
                'message_id' => $request->getSession()->getMessageId(),
                'new' => $request->getSession()->isNew(),
                'session_id' => $request->getSession()->getSessionId(),
                'skill_id' => $request->getSession()->getSkillId(),
                'user_id' => $request->getSession()->getUserId(),
            ],
        ];
    }
}