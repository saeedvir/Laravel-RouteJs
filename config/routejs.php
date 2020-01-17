<?php

return [
	'app_variable'=>'RouteJs',
	'js_file'=>public_path('public/routes.js'), //public/routes.js
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
