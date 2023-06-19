<?php

namespace Database\Seeders;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        Group::create([

            'type'=> 'Tecnologo',
            'program_id'=> 1,
            'start_date'=> '2023-04-04',
            'ending_date'=> '2025-03-01',
            'tab_leader_id'=> 1,
            'image_group' => 'choza.jpg'

        ]);

        Group::create([

            'type'=> 'Tecnico',
            'program_id'=> 2,
            'start_date'=> '2021-04-04',
            'ending_date'=> '2025-03-01',
            'tab_leader_id'=> 2,
            'image_group' => 'choza.jpg'

        ]);

        Group::create([

            'type'=> 'Tecnologo',
            'program_id'=> 2,
            'start_date'=> '2023-04-04',
            'ending_date'=> '2025-03-01',
            'tab_leader_id'=> 3,
            'image_group' => 'choza.jpg'

        ]);

    }
}
