<?php

return [
    "name"=> "Blog",
    "title"=> "Module for Blog",
    "slug"=> "blog",
    "thumbnail"=> "https://img.site/p/300/160",
    "is_dev" => env('MODULE_BLOG_ENV')?true:false,
    "excerpt"=> "Create your blogs here",
    "description"=> "Create your blogs here",
    "download_link"=> "",
    "author_name"=> "Priyanshu",
    "author_website"=> "https://vaah.dev",
    "version"=> "0.0.1",
    "is_migratable"=> true,
    "is_sample_data_available"=> false,
    "db_table_prefix"=> "vh_blog_",
    "providers"=> [
        "\\VaahCms\\Modules\\Blog\\Providers\\BlogServiceProvider"
    ],
    "aside-menu-order"=> null
];
