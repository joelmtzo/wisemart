<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@example.com',
            'password'=> Hash::make('admin'),
        ]);

        \App\Models\Category::create(['name' => 'Electrónicos']);
        \App\Models\Category::create(['name' => 'Ropa']);
        \App\Models\Category::create(['name' => 'Libros']);
        \App\Models\Category::create(['name' => 'Hogar y Jardín']);
        \App\Models\Category::create(['name' => 'Equipamiento Deportivo']);

        \App\Models\Product::create(['name' => 'Laptop HP Pavilion', 'brand' => 'HP', 'price' => 899.99, 'description' => 'Laptop para uso diario', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'iPhone 14', 'brand' => 'Apple', 'price' => 999.99, 'description' => 'Smartphone de última generación', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'Samsung Smart TV 55"', 'brand' => 'Samsung', 'price' => 699.99, 'description' => 'TV LED 4K', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'PlayStation 5', 'brand' => 'Sony', 'price' => 499.99, 'description' => 'Consola de videojuegos', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'AirPods Pro', 'brand' => 'Apple', 'price' => 249.99, 'description' => 'Auriculares inalámbricos', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'iPad Air', 'brand' => 'Apple', 'price' => 599.99, 'description' => 'Tablet de 10.9 pulgadas', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'MacBook Pro', 'brand' => 'Apple', 'price' => 1299.99, 'description' => 'Laptop profesional', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'Echo Dot', 'brand' => 'Amazon', 'price' => 49.99, 'description' => 'Altavoz inteligente', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'Nintendo Switch', 'brand' => 'Nintendo', 'price' => 299.99, 'description' => 'Consola híbrida', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'Canon EOS R', 'brand' => 'Canon', 'price' => 1999.99, 'description' => 'Cámara mirrorless', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'Dell XPS 13', 'brand' => 'Dell', 'price' => 1199.99, 'description' => 'Ultrabook premium', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'Galaxy Watch 5', 'brand' => 'Samsung', 'price' => 279.99, 'description' => 'Smartwatch', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'Bose QuietComfort', 'brand' => 'Bose', 'price' => 329.99, 'description' => 'Auriculares con cancelación de ruido', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'iMac 24"', 'brand' => 'Apple', 'price' => 1499.99, 'description' => 'Computadora todo en uno', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'GoPro Hero 11', 'brand' => 'GoPro', 'price' => 399.99, 'description' => 'Cámara de acción', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'Xbox Series X', 'brand' => 'Microsoft', 'price' => 499.99, 'description' => 'Consola de nueva generación', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'Surface Pro 8', 'brand' => 'Microsoft', 'price' => 999.99, 'description' => 'Tablet 2-en-1', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'LG OLED C2', 'brand' => 'LG', 'price' => 1799.99, 'description' => 'TV OLED 65"', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'Sonos Arc', 'brand' => 'Sonos', 'price' => 899.99, 'description' => 'Barra de sonido premium', 'is_available' => 1, 'category_id' => 1]);
        \App\Models\Product::create(['name' => 'DJI Mini 3 Pro', 'brand' => 'DJI', 'price' => 759.99, 'description' => 'Drone compacto', 'is_available' => 1, 'category_id' => 1]);

        // Ropa (Categoría 2)
        \App\Models\Product::create(['name' => 'Chaqueta de Cuero', 'brand' => 'Zara', 'price' => 89.99, 'description' => 'Chaqueta de cuero sintético', 'is_available' => 1, 'category_id' => 2]);
        \App\Models\Product::create(['name' => 'Jeans Clásicos', 'brand' => 'Levis', 'price' => 59.99, 'description' => 'Jeans de corte recto', 'is_available' => 1, 'category_id' => 2]);

        // Libros (Categoría 3)
        \App\Models\Product::create(['name' => 'Cien años de soledad', 'brand' => 'Editorial Sudamericana', 'price' => 24.99, 'description' => 'Obra maestra de Gabriel García Márquez', 'is_available' => 1, 'category_id' => 3]);
        \App\Models\Product::create(['name' => 'El Principito', 'brand' => 'Salamandra', 'price' => 19.99, 'description' => 'Clásico de Antoine de Saint-Exupéry', 'is_available' => 1, 'category_id' => 3]);

        // Hogar y Jardín (Categoría 4)
        \App\Models\Product::create(['name' => 'Set de Jardinería', 'brand' => 'Garden Pro', 'price' => 45.99, 'description' => 'Kit completo de herramientas de jardín', 'is_available' => 1, 'category_id' => 4]);
        \App\Models\Product::create(['name' => 'Juego de Sábanas', 'brand' => 'Home Collection', 'price' => 79.99, 'description' => 'Sábanas de algodón egipcio', 'is_available' => 1, 'category_id' => 4]);

        // Equipamiento Deportivo (Categoría 5)
        \App\Models\Product::create(['name' => 'Balón de Fútbol', 'brand' => 'Adidas', 'price' => 29.99, 'description' => 'Balón oficial tamaño 5', 'is_available' => 1, 'category_id' => 5]);
        \App\Models\Product::create(['name' => 'Raqueta de Tenis', 'brand' => 'Wilson', 'price' => 159.99, 'description' => 'Raqueta profesional', 'is_available' => 1, 'category_id' => 5]);
    }
}
