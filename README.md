# nb-grabber

Grabs the routes and schedules for a given transport agency from the [NextBus API](http://api-portal.anypoint.mulesoft.com/nextbus/api/nextbus-api/docs/reference).


## Requirements

PHP 5.4+ with the `curl` and `SimpleXML` extensions enabled.


## Installation

1. [Get Composer](http://getcomposer.org).

2 Check out the project's codebase and run `composer install` on it.
```bash
git clone https://github.com/stopfstedt/nb-grabber.git
cd nb-grabber
composer install
```

## Usage

```bash
php nb-grabber.php <agencyname>
```

### Example

To grab the routes, schedule etc for "AC Transit", pass `actransit` to the `nb-grabber.php` script.

```bash
php nb-grabber.php actransit
```

## Output

_todo_
