# yandex-dialogs-php-sdk
Репозиторий PHP-библиотеки для облегчения работы с диалогами

## Пример использования
```php
// получаем входящий API-запрос
$apiRequestArray = json_decode(trim(file_get_contents('php://input')), true);


$dialogRequest = Yandex\Dialogs\Webhook\Request\Fabric::initFromArray($apiRequestArray);
$responseFabric = new Yandex\Dialogs\Webhook\Response\Fabric($dialogRequest);

$button1 = new Yandex\Dialogs\Webhook\Response\DTO\Buttons\Button();
$button1
    ->setTitle('Кнопка1')
    ->setUrl('https://ya.ru');

$button2 = new Yandex\Dialogs\Webhook\Response\DTO\Buttons\Button();
$button2
    ->setTitle('Кнопка2');

$response = $responseFabric
    ->setText('Привет')
    ->setTts('Привет')
    ->addButton($button1)
    ->addButton($button2)
    ->buildResponse();


header('Content-Type: application/json');
print(json_encode(Yandex\Dialogs\Webhook\Response\Formatters\Formatter::toArray($response), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT));
```