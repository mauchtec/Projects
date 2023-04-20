<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sqlFilePath = public_path('sites.sql');
        
$databaseName = env('DB_DATABASE');
$databaseUserName = env('DB_USERNAME');
$databasePassword = env('DB_PASSWORD');
$databaseHost = env('DB_HOST');

$command = sprintf('mysql -u%s -p%s -h%s %s < %s', 
    $databaseUserName, 
    $databasePassword, 
    $databaseHost, 
    $databaseName, 
    $sqlFilePath
);

$result = shell_exec($command);
    }
}
