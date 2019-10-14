# Документация REST API сервиса Movies

## Описание
REST API сервиса Movies работает по протоколу HTTP и представляет собой набор методов, с помощью которых совершаются запросы и возвращаются ответы для каждой операции. Все ответы приходят в виде JSON структур.

## Основной URL

`http://<YOU_URL>/api`

## Регистрация

Для регистрации отправляеться POST запрос по ссылке<br>
`http://<YOU_URL>/api/register` <br>

Параметры запроса<br>

| Параметр  |          Значение |
| ------------- | ------------- |
| name  | Ваше имя  |
| email  | Ваш E-mail  |
| password  | Ваш пароль  |
| password_confirmation  | Подтверждение пароля  |

HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept | application/json  |
| Content-Type | application/json  |

Пример ответа:

    {
        "data": {
            "name": "John",
            "email": "john@gmail.com",
            "updated_at": "2019-10-14 09:31:17",
            "created_at": "2019-10-14 09:31:17",
            "id": 5,
            "api_token": "9dfZWFZRArnCmqhNd3bVq9ZUGEhuFIswbAGKXLcp9afUu44E60diIqCY37SZ"
        }
    }
Ваш ключ доступа (api_token):<br>
`9dfZWFZRArnCmqhNd3bVq9ZUGEhuFIswbAGKXLcp9afUu44E60diIqCY37SZ`<br>


## Авторизация

Для авторизации отправляеться POST запрос по ссылке<br>
`http://<YOU_URL>/api/login` <br>

Параметры запроса<br> 


| Параметр  |          Значение |
| ------------- | ------------- |
| email  | Ваш E-mail  |
| password  | Ваш пароль  |

HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept  | application/json  |
| Content-Type  | application/json  |

Пример ответа:

    {
        "data": {
            "id": 5,
            "name": "John",
            "email": "john@gmail.com",
            "email_verified_at": null,
            "created_at": "2019-10-14 09:31:17",
            "updated_at": "2019-10-14 11:53:02",
            "api_token": "fMll78bBYLbwQhzB7fJ69pvzwt75VkZLNUMEmx4MowCdIpMdLii8LduNCBKH"
        }
    }

При успешной авторизации пользователь получает новый ключ доступа (api_token):<br>
`fMll78bBYLbwQhzB7fJ69pvzwt75VkZLNUMEmx4MowCdIpMdLii8LduNCBKH`


## Деавторизация

Для деавторизации отправляеться POST запрос по ссылке<br>
`http://<YOU_URL>/api/logout` <br>
При этом в параметрах обязательно должен указываться ваш ключ доступа (api_token)<br>

| Параметр  |          Значение |
| ------------- | ------------- |
| api_token  | fMll78bBYLbwQhzB7fJ69pvzwt75VkZLNUMEmx4MowCdIpMdLii8LduNCBKH  |

HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept  | application/json  |
| Content-Type  | application/json  |

Пример ответа:

    {
        "data": "User logged out."
    }
Ваш ключ доступа (api_token) при этом удаляется.

## Получить список всех фильмов

Для получения списка всех фильмов отправляется GET запрос по ссылке<br>
`http://<YOU_URL>/api/movies` <br>
HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept  | application/json  |
| Content-Type  | application/json  |

Пример ответа:

    [
        {
            "id": 1,
            "title": "Форсаж: Хоббс и Шоу"
        },
        {
            "id": 3,
            "title": "Джон Уик 3"
        },
        {
            "id": 4,
            "title": "Аватар"
        }
    ]


# Получить информацию о фильме
Для получения информации о фильме отправляется GET запрос по ссылке с указанием ID фильма<br>
`http://<YOU_URL>/api/movies/4` <br>

Пример ответа:

    {
        "id": 4,
        "title": "Аватар",
        "year": "2009",
        "format": "avi",
        "actors": "Сэм Уортингтон,\r\nЗои Салдана,\r\nСигурни Уивер,\r\nСтивен Лэнг,\r\nМишель Родригес,\r\nДжованни Рибизи,\r\nДжоэль Мур",
        "author_user_id": "4",
        "created_at": "2019-10-13 21:33:32",
        "updated_at": "2019-10-13 21:33:32"
    }

## Найти фильм по названию или  имени актера
Для поиска по названию или имени актера отправляется GET запрос по ссылке <br>
`http://<YOU_URL>/api/search` <br>

При этом в параметре search_text указываем слово для поиска<br>

| Параметр  |          Значение |
| ------------- | ------------- |
| search_text  | Сэм Уортингтон  |


HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept  | application/json  |
| Content-Type  | application/json  |


Пример ответа:

    [
        {
            "id": 4,
            "title": "Аватар",
            "year": "2009",
            "format": "avi",
            "actors": "Сэм Уортингтон,\r\nЗои Салдана,\r\nСигурни Уивер,\r\nСтивен Лэнг,\r\nМишель Родригес,\r\nДжованни Рибизи,\r\nДжоэль Мур",
            "author_user_id": "4",
            "created_at": "2019-10-13 21:33:32",
            "updated_at": "2019-10-13 21:33:32"
        }
    ]


## Добавить фильм

Для добавления фильма отправляется POST запрос по ссылке<br>
`http://<YOU_URL>/api/movies` <br>

Параметры:<br>

| Параметр  |  Значение   |
| ------------- | ------------- |
| title  | Джокер |
| year  | 2019 |
| film_format  | Blu-Ray |
| actors  | Хоакин Феникс |
| api_token  | fMll78bBYLbwQhzB7fJ69pvzwt75VkZLNUMEmx4MowCdIpMdLii8LduNCBKH  |




HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept  | application/json  |
| Content-Type  | application/json  |

Пример ответа:

    {
        "title": "Джокер",
        "year": "2019",
        "format": "avi",
        "actors": "Хоакин Феникс",
        "author_user_id": 5,
        "updated_at": "2019-10-14 12:34:12",
        "created_at": "2019-10-14 12:34:12",
        "id": 6
    }


## Редактировать фильм

Для редактирования фильма отправляется PATCH запрос по ссылке с указанием ID фильма <br>
`http://<YOU_URL>/api/movies/6` <br>
Параметры:

| Параметр  |          Значение |
| ------------- | ------------- |
| title  | Джокер |
| year  | 2019 |
| film_format  | Blu-Ray |
| actors  | Хоакин Феникс, _Марк Хэмилл_ |
| api_token  | fMll78bBYLbwQhzB7fJ69pvzwt75VkZLNUMEmx4MowCdIpMdLii8LduNCBKH  |

HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept | application/json  |
| Content-Type | application/json  |

Пример ответа:

    {
        "id": 6,
        "title": "Джокер",
        "year": "2019",
        "format": "avi",
        "actors": "Хоакин Феникс, Марк Хэмилл",
        "author_user_id": "5",
        "created_at": "2019-10-14 12:34:12",
        "updated_at": "2019-10-14 12:39:41"
    }

## Удалить фильм

Для удаления фильма отправляется DELETE запрос по ссылке с указанием ID фильма<br>
`http://<YOU_URL>/api/movies/6` <br>
Параметры:

| Параметр  |          Значение |
| ------------- | ------------- |
| api_token  | fMll78bBYLbwQhzB7fJ69pvzwt75VkZLNUMEmx4MowCdIpMdLii8LduNCBKH  |

HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept | application/json  |
| Content-Type | application/json  |

При успешном удалении вернется пустой ответ и статус 204. 

