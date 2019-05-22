<?php

use Illuminate\Database\Seeder;

class ReceitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Receita::create([
            'title' => 'Neque porro  est qui ',
            'procedure' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vel nulla id felis lobortis auctor. sit amet convallis libero tempor vitae. Nullam venenatis suscipit lacus eget ultricies.',
            'publisher_id' => 1
        ]);
       \App\Models\Receita::create([
            'title' => 'Sit amet, adipisci velit',
            'procedure' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vel nulla id felis lobortis auctor.mauris, sit amet convallis libero tempor vitae. Nullam venenatis suscipit lacus eget ultricies.',
            'publisher_id' => 2
        ]);
       \App\Models\Receita::create([
            'title' => 'Nconsectetur, elit',
            'procedure' => 'lacinia ac magna. Duis commodo justo mauris, sit amet convallis libero tempor vitae. Nullam venenatis suscipit lacus eget ultricies.',
            'publisher_id' => 1
        ]);
       \App\Models\Receita::create([
            'title' => 'Sit amet, velit',
            'procedure' => ' Nullam venenatis suscipit lacus eget ultricies.',
            'publisher_id' => 2
        ]);
    }
}
