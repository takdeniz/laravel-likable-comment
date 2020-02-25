# Laravel likable comment

Basically add comment with like/dislike feature.

#### This package use [actuallymab/laravel-comment](https://github.com/actuallymab/laravel-comment)

`laravel-comment` package is a very good but doesn't allow like/dislike or upvote/downvote for comment. This repo fix this issues
 
 
#### Install and configure
 
To install package, run:
 
```bash
$ composer require takdeniz/laravel-likable-comment
```
If you don't use auto-discovery, or using Laravel version < 5.5 Add service provider to your app.php file

``` php
\Takdeniz\LikableComment\LikableCommentServiceProvider::class
```

Publish configurations and migrations, then migrate comments table.

``` bash
$ php artisan vendor:publish --provider="Takdeniz\LikableComment\LikableCommentServiceProvider"
$ php artisan migrate
```
