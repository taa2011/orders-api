# Заказы 

Для работы требуется:
- Nginx
- PHP ~8.0
- MySql ~8.0

### Сборка проекта

```
composer install
php artisan key:generate
php artisan migrate
```



В `docs/swagger.yml` находится описание запросов к API проекта.
