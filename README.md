# Bitcoin tracker

## Setup

1. Create a cron for the task schedule of Laravel:

https://laravel.com/docs/8.x/scheduling#running-the-scheduler

or Run it locally:

https://laravel.com/docs/8.x/scheduling#running-the-scheduler-locally

2. Run the queue

```
php artisan queue:work --queue=high,default
```