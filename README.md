# RouteJs
Generate Laravel Routes For Access In JavaScript
<div lang="fa" dir="rtl">

## توضیحات فارسی
با استفاده از این پکیج می توانید از همه مسیرهای تعریف شده یا مسیرهایی که مشخص می کنید،دریک فایل جاوااسکریپت خروجی بگیرید و با استفاده از تابع زیر به آنها دسترسی داشته باشید.
</div>

### How to install ?

```php
composer require saeedvir/laravel-routejs
```

```php
php artisan vendor:publish --provider="Saeedvir\RouteJs\RoutejsServiceProvider" 
```

### How to use ?

edit 'config/routejs.php

```php
<?php

return [
	'app_variable'=>'RouteJs',
	'js_file'=>public_path('routes.js'), //public/routes.js
	'export_all_routes'=>false, // if true then export all routes
	'routes'=>[
		'user'=>['home'],
		'admin'=>['users.index'],
		/*'home',
		'blog',
		'post',
		'post.comment',
		'list',*/
	],
	'js_files'=>[
		'user'=>'routejs.user.js',
		'admin'=>'routejs.admin.js',
	],
	'append_js'=>'', // for ex : 'var tmp="tmp_value";console.log(tmp);'
];

```
then

```php
php artisan route:export-js

```

and

```html
<script src="routes.js"></script>

alert(route('post',{id:23}))

```

```js
//Route::get('/Blog-Page',function(){})->name('blog');
route('blog',{});
//return  /Blog-Page

//Route::get('/Blog-Page',function(){})->name('blog');
route('blog',{order:'new'});
//return  /Blog-Page?sord=new


//Route::get('/Blog-Page/{id}',function(){})->name('post');
route('post',{id:12});
//return /Blog-Page/12

//Route::get('/Blog-Page/{id}/comment/{comment_id}',function(){})->name('post.comment');
route('post.comment',{id:12,comment_id:8});
//return /Blog-Page/12/comment/8

```

