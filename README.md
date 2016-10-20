# Epochta notification channel for Laravel 5.3

This package makes it easy to send notifications using [Epochta aka Atompark](https://www.massmailsoftware.com/) with Laravel 5.3.

## Contents

- [Installation](#installation)
    - [Setting up the configuration](#setting-up-the-configuration)
- [Usage](#usage)
    - [Available Message methods](#available-message-methods)
- [Testing](#testing)
- [Credits](#credits)
- [License](#license)


## Installation

You can install this package via composer:

``` bash
composer require enniel/laravel-epochta-notification-channel
```

Next add the service provider to your `config/app.php`:

```php
...
'providers' => [
    ...
     NotificationChannels\Epochta\EpochtaServiceProvider::class,
],
...
```



### Setting up the configuration

Add your private and public keys to your `config/services.php`:

```php
// config/services.php
...
'epochta' => [
    'sms' => [
        'public_key' => env('EPOCHTA_SMS_PUBLIC_KEY'),
        'private_key' => env('EPOCHTA_SMS_PRIVATE_KEY'),
    ],
],
...
```

## Usage

Now you can use the channel in your `via()` method inside the notification:

``` php
use NotificationChannels\Epochta\EpochtaChannel;
use NotificationChannels\Epochta\EpochtaMessage;
use Illuminate\Notifications\Notification;

class ExampleNotification extends Notification
{
    public function via($notifiable)
    {
        return [EpochtaChannel::class];
    }

    public function toEpochta($notifiable)
    {
        return (new EpochtaMessage())
            ->text('message text')
            ->sender('test');
    }
}
```


In order to let your Notification know which phone number you are targeting, add the `routeNotificationForEpochta` method to your Notifiable model.

### Available message methods

- `from()`: The identity of the sender.
- `text()`: The text of the message.
- `to()`: Recipient's phone number.
- `at()`: Sending a message at a specified time.
- `life()`: Life time SMS (0 = maximum, 1, 6, 12, 24 hours).
- `type()`: For Russia it is possible to specify the type of distribution type parameter.

## Testing

``` bash
$ composer test
```

## Credits

- [Evgeni Razumov](https://github.com/enniel)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
