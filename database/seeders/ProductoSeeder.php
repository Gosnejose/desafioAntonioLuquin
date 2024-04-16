<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {                

        $Producto = new Producto();
        $Producto->nombre = 'buso';
        $Producto->obsercacion = '123456';
        $Producto->descripcion = 'algodon';
        $Producto->precio = '123';
        $Producto->stock = '12';
        $Producto->save();

        
        $Producto = new Producto();
        $Producto->nombre = 'Zapatillas';
        $Producto->obsercacion = '123456';
        $Producto->descripcion = 'tela ';
        $Producto->precio = '12345';
        $Producto->stock = '1245';
        $Producto->save();

        
        $Producto = new Producto();
        $Producto->nombre = 'pantalon';
        $Producto->obsercacion = '123456';
        $Producto->descripcion = 'algodon';
        $Producto->precio = '123';
        $Producto->stock = '145';
        $Producto->save();


        $Producto = new Producto();
        $Producto->nombre = 'remera';
        $Producto->obsercacion = '123456';
        $Producto->descripcion = 'tela ';
        $Producto->precio = '125';
        $Producto->stock = '1245';
        $Producto->save();

    }
}