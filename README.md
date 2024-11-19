# Установка и запуск проекта

## Требования

- PHP 8.2

## Установка

Перед началом работы выполните следующие команды:

```bash
composer install
php artisan key:generate
php artisan migrate
php artisan serve
```

# API Routes Documentation

## Register
- **Route**: `POST /api/register`
- **Controller**: `RegisterController`
- **Method**: `register`
- **Name**: `register`
- **Description**: Регистрация пользователя.

## Login
- **Route**: `POST /api/login`
- **Controller**: `RegisterController`
- **Method**: `login`
- **Name**: `login`
- **Description**: Авторизация пользователя.

## Profile
- **Route**: `GET /api/profile`
- **Controller**: `RegisterController`
- **Method**: `profile`
- **Name**: `profile`
- **Description**: Данные о пользователе.
