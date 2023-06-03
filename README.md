## Application Requirement
- Create task (info to save: task name, priority, timestamps)
- Edit task
- Delete task
- Reorder tasks with drag and drop in the browser. Priority should automatically be updated based on this. #1 priority goes at top, #2 next down and so on.
- Tasks should be saved to a mysql table.
- BONUS POINT: add project functionality to the tasks. User should be able to select a project from a dropdown and only view tasks associated with that project.

## System Requirement
- PHP v8.1 - v8.2: Laravel 10.x requires a minimum PHP version of 8.1. For more detail visit https://laravel.com/docs/10.x/releases

## Deployment
- Extract the archive and put it in the folder you want
- Run `cp .env.example .env` file to copy example file to .env
- Then edit your `.env` file with DB credentials and other settings.
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dev_task_manager
DB_USERNAME=root
DB_PASSWORD=
```
- Run `composer install` command
- Run `php artisan migrate --seed` command.
- Notice: seed is important, because it will create the first admin user for you.
- Run `php artisan key:generate` command.
- If you have file/photo fields, run `php artisan storage:link` command.
- And that's it, run `php artisan serve` and login:

### Default credentials
```
Username: admin@task.com
Password: password
```

## Third Party Tools
- Theme: https://coreui.io/vue/docs/3.2/introduction/
