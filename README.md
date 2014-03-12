# nb-grabber

Grabs the routes and schedules for a given transport agency from the [NextBus API](http://api-portal.anypoint.mulesoft.com/nextbus/api/nextbus-api/docs/reference).


## Requirements

PHP 5.4+ with the `curl` and `SimpleXML` extensions enabled.


## Installation

1. [Get Composer](http://getcomposer.org).

2. Check out the project's codebase and run `composer install` on it.
```bash
git clone https://github.com/stopfstedt/nb-grabber.git
cd nb-grabber
composer install
```

## Usage

```bash
php nb-grabber.php <agencyname> <format>
```

Run the _nb-grabber.php_ script whilst providing values for its two mandatory arguments.

These arguments are:

1. **`<agencyname>`:** The machine name of the transit authority that you want to query. E.g. _actransit_ for "AC Transit".
2. **`<format>`:** Allowed values are _xml_ and _csv-schedule_.


### Example

To grab the routes and schedules for "AC Transit",  run this:

```bash
php nb-grabber.php actransit xml
```

To print the schedules for all "AC Transit" routes as CSV files, run this:

```bash
php nb-grabber.php actransit csv-schedule
```

## Output

### XML Routes and Schedules

_todo_

### CSV Schedules

_todo_
