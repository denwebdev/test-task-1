Задание:

task.pdf

Инструкция по запуску:

- docker-compose build
- docker-compose up
- docker-compose exec fpm php /var/www/test-task-1/artisan migrate
- теперь приложение доступно по http://127.0.0.1:8000/
