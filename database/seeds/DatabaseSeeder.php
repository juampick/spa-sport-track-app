<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Type;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(TypeTableSeeder::class);

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name' => 'Juan Cook',
            'email' => 'juan.cook@toptal.com',
            'password' => Hash::make('toptal')
        ]);
    }
}

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();

        $types = array(
            ['description' => 'Walking'],
            ['description' => 'Running'],
            ['description' => 'Swimming'],
            ['description' => 'Kayaking'],
            ['description' => 'Cycling']
        );

        foreach ($types as $type)
        {
            Type::create($type);
        }
    }
}