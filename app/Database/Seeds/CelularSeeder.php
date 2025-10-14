<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CelularSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'marca' => 'Samsung',
                'modelo' => 'Galaxy S24',
                'precio' => 3899.00,
                'almacenamiento' => '256GB',
                'ram' => '12GB',
                'descripcion' => 'Celular gama alta con cámara triple y pantalla AMOLED.',
                'imagen' => 's24.jpg'
            ],
            [
                'marca' => 'Xiaomi',
                'modelo' => 'Redmi Note 13 Pro',
                'precio' => 1799.00,
                'almacenamiento' => '128GB',
                'ram' => '8GB',
                'descripcion' => 'Excelente relación calidad-precio con batería de larga duración.',
                'imagen' => 'note13pro.jpg'
            ],
            [
                'marca' => 'Apple',
                'modelo' => 'iPhone 15',
                'precio' => 5299.00,
                'almacenamiento' => '256GB',
                'ram' => '8GB',
                'descripcion' => 'Última generación con chip A17 Bionic y cámara profesional.',
                'imagen' => 'iphone15.jpg'
            ]
        ];

        $this->db->table('celulares')->insertBatch($data);
    }
}
