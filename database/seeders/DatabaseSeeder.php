<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Pemasok;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Fadhil',
            'email' => 'fadhil@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => 1
        ]);

        Unit::create([
            'unit' => 'Kapsul'
        ]);

        Unit::create([
            'unit' => 'Tablet'
        ]);

        Unit::create([
            'unit' => 'Sirup'
        ]);

        Pemasok::create([
            'nama_pemasok' => 'Kimia Farma',
            'alamat' => 'Jln. Kimia Farma',
            'telepon' => '0853xxxx'
        ]);

        Pemasok::create([
            'nama_pemasok' => 'Kimia Biru',
            'alamat' => 'Jln. Kimia Biru',
            'telepon' => '0852xxxx'
        ]);

    }
}
