<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Estados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crear los estado de la Tabla Estados
        $arrayEstados = [
            'Aguascalientes',
            'Baja California',
            'Baja California Sur',
            'Campeche',
            'Ciudad de México',
            'Chiapas',
            'Chihuahua',
            'Coahuila de Zaragoza',
            'Colima',
            'Durango',
            'Estado de México',
            'Guanajuato',
            'Guerrero',
            'Hidalgo',
            'Jalisco',
            'Michoacán de Ocampo',
            'Morelos',
            'Nayarit',
            'Nuevo León',
            'Oaxaca',
            'Puebla',
            'Querétaro',
            'Quintana Roo',
            'San Luis Potosí',
            'Sinaloa',
            'Sonora',
            'Tabasco',
            'Tamaulipas',
            'Tlaxcala',
            'Veracruz de Ignacio de la Llave',
            'Yucatán',
            'Zacatecas'
        ];

        foreach($arrayEstados as $estado){
            DB::table('Estados')->insert([
                'Nombre' => $estado
            ]);
        }

        $arrayPersonas = [
            [
                'Nombre' => "Persona chingona",
                'Edad' => 0,
                'Password' =>  Hash::make("passwordPerron"),
                'Email' => '@yopmail.com',
                'Telefono' => 0,
                'Estado_id' => 0,
            ]
        ];

        for($i=0; $i <= 10000; $i++) {

            DB::table('Personas')->insert([
                'Nombre' => "Persona".$i,
                'Edad' => rand(5, 99),
                'Password' => Hash::make("passwordPerron"),
                'Email' => "correo".$i."@yopmail.com",
                'Telefono' => random_int(1111111111, 9999999999),
                'Estado_id' => rand(1, 25),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        }

    }
}
