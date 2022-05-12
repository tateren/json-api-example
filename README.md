# json-api-example

[JSON:API](https://jsonapi.org/) example server

## setup

```
$ composer install
$ php artisan migrate:fresh --seed
$ php artisan serve
```

## endpoints

- http://localhost:8000/api/v1/comments
- http://localhost:8000/api/v1/comments/1
- http://localhost:8000/api/v1/comments/1/post
- http://localhost:8000/api/v1/comments/1/relationships/post
- http://localhost:8000/api/v1/comments/1/relationships/user
- http://localhost:8000/api/v1/comments/1/user
- http://localhost:8000/api/v1/posts
- http://localhost:8000/api/v1/posts/1
- http://localhost:8000/api/v1/posts/1/author
- http://localhost:8000/api/v1/posts/1/comments
- http://localhost:8000/api/v1/posts/1/relationships/author
- http://localhost:8000/api/v1/posts/1/relationships/comments
- http://localhost:8000/api/v1/posts/1/relationships/tags
- http://localhost:8000/api/v1/posts/1/tags
- http://localhost:8000/api/v1/tags
- http://localhost:8000/api/v1/tags/1
- http://localhost:8000/api/v1/tags/1/posts
- http://localhost:8000/api/v1/tags/1/relationships/posts
- http://localhost:8000/api/v1/users
- http://localhost:8000/api/v1/users/1
- http://localhost:8000/api/v1/users/1/comments
- http://localhost:8000/api/v1/users/1/posts
- http://localhost:8000/api/v1/users/1/relationships/comments
- http://localhost:8000/api/v1/users/1/relationships/posts
