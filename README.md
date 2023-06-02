[[_TOC_]]

# PHPBitLaunch

PHPBitLaunch is a PHP client library for accessing the BitLaunch API.

You can view BitLaunch API docs here: https://developers.bitlaunch.io/

## Install

```sh
composer require "bitlaunchio/phpbitlaunch"
```

## Usage

```php
require_once('vendor/autoload.php');

// Create a PHPBitLaunch Client
$client = new PHPBitLaunch\Client('API_KEY');
```

### Account

#### Show
Show account details

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

try {
    $account = $client->account()->show();
} catch (RuntimeException $e) {
    // Handle Error
}
```

#### Usage
Show account usage

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

try {
    $usage = $client->account()->usage('2022-01');
} catch (RuntimeException $e) {
    // Handle Error
}
```

#### History
Show account activity

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

try {
    $history = $client->account()->history(1, 20);
} catch (RuntimeException $e) {
    // Handle Error
}
```

### Create Options

#### Show
Show create options for a host

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

try {
    $opts = $client->createOptions()->show(4);
} catch (RuntimeException $e) {
    // Handle Error
}
```

### SSH Key

#### Create
Add an SSH key

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

$keyName = 'My SSH Key';
$keyContent = 'ssh-rsa AAA......';

try {
    $key = $client->sshKey()->create($keyName, $keyContent);
} catch (RuntimeException $e) {
    // Handle Error
}
```

#### List
List the SSH keys

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

try {
    $keys = $client->sshKey()->list();
} catch (RuntimeException $e) {
    // Handle Error
}
```

#### Delete
Delete an SSH key

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

try {
    $client->sshKey()->delete('aaaaaaaaaaabbbbbbbbbbbbb');
} catch (RuntimeException $e) {
    // Handle Error
}
```

### Transaction

#### Create
Create a new transaction

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

$amountUsd = 20;
$cryptoSymbol = 'BTC';

try {
    $transaction = $client->transaction()->create($amountUsd, $cryptoSymbol);
} catch (RuntimeException $e) {
    // Handle Error
}
```

#### List
List the transaction history

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

try {
    $transactions = $client->transaction()->list(1, 25);
} catch (RuntimeException $e) {
    // Handle Error
}
```

#### Show
Show a transaction

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

try {
    $transaction = $client->transaction()->show('aaaaaaaaaaabbbbbbbbbbbbb');
} catch (RuntimeException $e) {
    // Handle Error
}
```

### Server

#### Create
Create a server

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

$opts = new \PHPBitLaunch\Types\ServerCreateOptions([
    'name' => 'My Server',
    'hostID' => 4,
    'hostImageID' => '10002',
    'sizeID' => 'nibble-1024',
    'regionID' => 'ams1',
    'password' => 'secure_password',
]);

try {
    $server = $client->server()->create($opts);
} catch (RuntimeException $e) {
    // Handle Error
}
```

#### List
List your servers

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

try {
    $servers = $client->server()->list();
} catch (RuntimeException $e) {
    // Handle Error
}
```

#### Show
Show a server

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

try {
    $server = $client->server()->show('aaaaaaaaaaabbbbbbbbbbbbb');
} catch (RuntimeException $e) {
    // Handle Error
}
```

#### Destroy
Destroy a server

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

try {
    $client->server()->destroy('aaaaaaaaaaabbbbbbbbbbbbb');
} catch (RuntimeException $e) {
    // Handle Error
}
```

#### Rebuild
Rebuild a servers image

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

$hostImageID = '12001';
$imageDescription = 'Debian 10';

try {
    $client->server()->rebuild('aaaaaaaaaaabbbbbbbbbbbbb', $hostImageID, $imageDescription);
} catch (RuntimeException $e) {
    // Handle Error
}
```

#### Resize
Resize a server

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

try {
    $client->server()->resize('aaaaaaaaaaabbbbbbbbbbbbb', 'nibble-2048');
} catch (RuntimeException $e) {
    // Handle Error
}
```

#### Restart
Restart a server

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

try {
    $client->server()->restart('aaaaaaaaaaabbbbbbbbbbbbb');
} catch (RuntimeException $e) {
    // Handle Error
}
```

#### Stop
Stop a server

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

try {
    $client->server()->stop('aaaaaaaaaaabbbbbbbbbbbbb');
} catch (RuntimeException $e) {
    // Handle Error
}
```

#### Protect
Enable/Disable protection for a server

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

try {
    $server = $client->server()->protect('aaaaaaaaaaabbbbbbbbbbbbb', true);
} catch (RuntimeException $e) {
    // Handle Error
}
```

#### Set Ports
Set the ports to use for protection

```php
use \PHPBitLaunch\Exceptions\RuntimeException;

$ports = [
    new \PHPBitLaunch\Types\Port([
        'portNumber' => 1234,
        'protocol' => 'tcp',
    ]),
    new \PHPBitLaunch\Types\Port([
        'portNumber' => 1235,
        'protocol' => 'tcp',
    ]),
];

try {
    $server = $client->server()->setPorts('aaaaaaaaaaabbbbbbbbbbbbb', $ports);
} catch (RuntimeException $e) {
    // Handle Error
}
```
