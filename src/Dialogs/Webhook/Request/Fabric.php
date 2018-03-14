<?php
declare(strict_types=1);

namespace Yandex\Dialogs\Webhook\Request;

use Yandex\Dialogs;

/**
 * Class Fabric
 *
 * @package Yandex\Dialogs\Webhook\Request
 */
class Fabric
{
    /**
     * @param array $arRequest
     *
     * @return Dialogs\Webhook\Request\DTO\Request
     */
    public static function initFromArray(array $arRequest): Dialogs\Webhook\Request\DTO\Request
    {
        $request = new Dialogs\Webhook\Request\DTO\Request();
        $meta = new Dialogs\Webhook\Request\DTO\Meta();
        $meta
            ->setClientId($arRequest['meta']['client_id'])
            ->setLocale($arRequest['meta']['locale'])
            ->setTimezone(new \DateTimeZone($arRequest['meta']['timezone']));
        $phrase = new Dialogs\Webhook\Request\DTO\Phrase();
        $phrase
            ->setCommand($arRequest['request']['command'])
            ->setOriginalUtterance($arRequest['request']['original_utterance'])
            ->setType($arRequest['request']['type']);

        $session = new Dialogs\Webhook\Request\DTO\Session();
        $session
            ->setMessageId($arRequest['session']['message_id'])
            ->setIsNew($arRequest['session']['new'])
            ->setSessionId($arRequest['session']['session_id'])
            ->setSkillId($arRequest['session']['skill_id'])
            ->setUserId($arRequest['session']['user_id']);

        $request
            ->setVersion($arRequest['version'])
            ->setMeta($meta)
            ->setPhrase($phrase)
            ->setSession($session);

        return $request;
    }
}