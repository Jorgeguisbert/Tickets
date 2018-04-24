<?php

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tickets')->insert([
      ['nombre' => 'Ticket Consulta','descripcion'=>'Ticket Consulta General ','importancia'=>'Media'],
      ['nombre' => 'Ticket Quirofano','descripcion'=>'Ticket Consulta Quirofano ','importancia'=>'Media'],
      ['nombre' => 'Ticket Cardiologia','descripcion'=>'Ticket Consulta Cardiologia ','importancia'=>'Alta'],
      ]);
    }
}
