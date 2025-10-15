<?php

namespace App\Controllers;

class TestController extends BaseController
{
    public function index()
    {
        echo "<h1>TestController funcionando!</h1>";
        echo "<p>Si ves esto, significa que el enrutamiento de CodeIgniter está funcionando.</p>";
        echo "<a href='/'>Volver al inicio</a>";
    }
    
    public function celulares()
    {
        echo "<h1>Ruta /test/celulares funcionando!</h1>";
        echo "<p>Base de datos conectada correctamente.</p>";
        
        // Probar conexión con el modelo
        try {
            $model = new \App\Models\CelularModel();
            $celulares = $model->findAll();
            echo "<p>Celulares encontrados: " . count($celulares) . "</p>";
            
            foreach ($celulares as $celular) {
                echo "<p>- " . $celular['marca'] . " " . $celular['modelo'] . "</p>";
            }
        } catch (Exception $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }
        
        echo "<a href='/'>Volver al inicio</a>";
    }
}