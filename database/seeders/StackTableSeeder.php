<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stack = [
            [
                'nama'     => 'HTML',
                'icon'     => 'html5-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'CSS',
                'icon'     => 'css3-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'JavaScript',
                'icon'     => 'javascript-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'TypeScript',
                'icon'     => 'typescript-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'PHP',
                'icon'     => 'php-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'Dart',
                'icon'     => 'dart-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'MySQL',
                'icon'     => 'mysql-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'PostgreSQL',
                'icon'     => 'postgresql-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'MongoDB',
                'icon'     => 'mongodb-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'Redis',
                'icon'     => 'redis-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'Firebase',
                'icon'     => 'firebase-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'Tailwind CSS',
                'icon'     => 'tailwindcss-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'Bootstrap',
                'icon'     => 'bootstrap-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'Material UI',
                'icon'     => 'materialui-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'Vue Js',
                'icon'     => 'vuejs-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'Nuxt Js',
                'icon'     => 'nuxtjs-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'Laravel',
                'icon'     => 'laravel-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'CodeIgniter',
                'icon'     => 'codeigniter-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'Symfony',
                'icon'     => 'symfony-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'JQuery',
                'icon'     => 'jquery-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'Composer',
                'icon'     => 'composer-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'Flutter',
                'icon'     => 'flutter-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'Node Js',
                'icon'     => 'nodejs-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'Yii',
                'icon'     => 'yii-plain',
                'by_users' => 1
            ],
            [
                'nama'     => 'Express Js',
                'icon'     => 'express-original',
                'by_users' => 1
            ],
            [
                'nama'     => 'NPM',
                'icon'     => 'npm-original-wordmark',
                'by_users' => 1
            ],
        ];
        foreach ($stack as $row) {
            DB::table('stack')->insert($row);
        }
    }
}
