<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->ean13(), // Código único EAN-13
            'name' => $this->faker->word(), // Nombre aleatorio
            'description' => $this->faker->sentence(), // Descripción aleatoria
            'image' => $this->faker->imageUrl(640, 480, 'products'),
            'stock' => $this->faker->numberBetween(10, 100),
            'stock_min' => $this->faker->numberBetween(5, 10),
            'purchase_price' => $this->faker->randomFloat(2, 10, 500), // Precio de compra entre 10 y 500
            'stock_max' => $this->faker->numberBetween(50, 200),
            'sale_price' => $this->faker->randomFloat(2, 20, 600),
            'admission_date' => $this->faker->date(),
            // 'image' => $this->faker->imageUrl(width: 640, height: 480, category: 'products', randomizer: true), // URL de imagen aleatoria
            // 'stock' => $this->faker->numberBetween(int1: 10, int2: 100), // Stock entre 10 y 100 unidades
            // 'stock_min' => $this->faker->numberBetween(int1: 5, int2: 10), // Stock mín entre 5 y 10 unidades
            // 'stock_max' => $this->faker->numberBetween(int1: 50, int2: 200), // Stock máx entre 50 y 200 unidades
            // 'purchase_price' => $this->faker->randomFloat(nbMaxDecimals: 2, min: 10, max: 500), // Precio de compra entre 10 y 500
            // 'sale_price' => $this->faker->randomFloat(nbMaxDecimals: 2, min: 20, max: 600), // Precio de venta entre 20 y 600
            // 'admission_date' => $this->faker->date(), // Fecha de ingreso aleatoria
            'category_id' => 3, // Relación con la tabla de categorías
            'company_id' => 1, // ID de la empresa (fijo en este caso)
        ];
    }
}
