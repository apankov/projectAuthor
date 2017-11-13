# projectAuthor
# Задание

Разработать приложение для ведения персонального блога некоторого автора. В системе может присутствовать несколько авторов.

## Требования к функционалу

* Аутентификация пользователей, регистрация
* Роли пользователей: writer, guest
* Функционал по ролям:
    - writer -- возможность создавать новые статьи, редактировать свои собственные
    - guest -- оставлять комментарии на все статьи
* Редактор статей:
    - доступ только для аутентифицированных пользователей
    - CRUD интерфейс
    - редактировать только свои собственные статьи
    - возможность просматривать комментарии к статье
    - возможность загружать изображения к статье (опционально, при наличии времени)
* Публичный интерфейс просмотра статей в режиме гостя
    - добавление комментариев

## Технические требования к решению

* PHP
* MVC
* Composer
* не использовать существующие PHP-фреймворки
* можно использовать PHP-библиотеки, доступные из Composer
    - разрешается использовать отдельные библиотеки из существующих PHP-фреймворков
* Contentful
* UI/UX не принципиален
