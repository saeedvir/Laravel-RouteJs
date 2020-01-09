<?php

namespace Saeedvir\RouteJs\Commands;

use File;
use Illuminate\Console\Command;

class RoutesJsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:export-js';

    /**
     *
     *
     * @var string
     *
     */
    protected $js_function = 'function route(name,parameters){if(!RouteJs || name == null || RouteJs.routes[name] == undefined){return false;}var r_js = RouteJs.routes[name];var r_js_qs = {};Object.keys(parameters).forEach(function(key) {if(r_js.indexOf(\'{\'+key+\'}\')>-1){r_js = r_js.replace(\'{\'+key+\'}\',parameters[key]);}else{r_js_qs[key]=parameters[key];}});var queryString=null;queryString = Object.keys(r_js_qs).map((ks) => {return encodeURIComponent(ks) + \'=\' + encodeURIComponent(r_js_qs[ks}).join(\'&\');r_js_qs={};if(queryString==null || queryString==""){return r_js;}else{return r_js+\'?\'+queryString;}}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export Laravel Routes To Java Scripts Var';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (config('routejs.export_all_routes', false) === true) {
            $routeCollection                    = \Route::getRoutes();
            $output_js                          = ['routes' => []];
            $output_js['routes'][$v->getName()] = $v->uri;
        } else {
            $routes_js = config('routejs.routes', []);

            $routeCollection = \Route::getRoutes();

            $output_js = ['routes' => []];

            foreach ($routeCollection as $v) {

                if ($v->getName() !== null && in_array($v->getName(), $routes_js, true) !== false) {
                    $output_js['routes'][$v->getName()] = $v->uri;

                }
            }
        }

        File::put(config('routejs.js_file'),
            'var ' . config('routejs.app_variable', 'AppRoutes') . ' = ' . json_encode($output_js) . ';' . "\n" .
            $this->js_function . "\n" .
            config('routejs.append_js')
        );

        print_r('"' . config('routejs.js_file') . '" Successfully Created !');

    }

}