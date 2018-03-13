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
        $meta->setClientId($arRequest['meta']['client_id']);

        $request->setMeta($meta);

        return $request;
    }
}