<?php

namespace App\Controllers;

use App\Models\CelularModel;

class CelularController extends BaseController
{
    public function index()
    {
        try {
            $model = new CelularModel();
            $data['celulares'] = $model->findAll();
        } catch (\Exception $e) {
            // Si hay error de base de datos, usar datos de prueba
            $data['celulares'] = [
                [
                    'id' => 1,
                    'marca' => 'Samsung',
                    'modelo' => 'Galaxy S24',
                    'precio' => 3899.00,
                    'almacenamiento' => 256,
                    'ram' => 12,
                    'descripcion' => 'Celular gama alta con cámara triple y pantalla AMOLED',
                    'imagen' => null
                ],
                [
                    'id' => 2,
                    'marca' => 'Xiaomi',
                    'modelo' => 'Redmi Note 13 Pro',
                    'precio' => 1799.00,
                    'almacenamiento' => 128,
                    'ram' => 8,
                    'descripcion' => 'Excelente relación calidad-precio con batería de larga duración',
                    'imagen' => null
                ],
                [
                    'id' => 3,
                    'marca' => 'Apple',
                    'modelo' => 'iPhone 15',
                    'precio' => 5299.00,
                    'almacenamiento' => 128,
                    'ram' => 6,
                    'descripcion' => 'Última generación con chip A17 Bionic y cámara profesional',
                    'imagen' => null
                ]
            ];
        }
        return view('celulares/index', $data);
    }

    public function create()
    {
        $model = new CelularModel();

        // Obtener datos del formulario
        $data = $this->request->getPost();

        // Manejo de la imagen (input file name="imagen")
        $file = $this->request->getFile('imagen');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $uploadPath = FCPATH . 'uploads/';
            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);

            // Guardar ruta relativa para usar en vistas
            $data['imagen'] = 'uploads/' . $newName;
        }

        $model->insert($data);

        return redirect()->to('/index.php/celulares');
    }


    public function update($id)
    {
        $model = new CelularModel();

        $data = $this->request->getPost();

        // Manejo de nueva imagen: si suben una, moverla y borrar la antigua
        $file = $this->request->getFile('imagen');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $uploadPath = FCPATH . 'uploads/';
            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Borrar imagen antigua si existe
            $existing = $model->find($id);
            if (! empty($existing['imagen'])) {
                $oldPath = FCPATH . $existing['imagen'];
                if (file_exists($oldPath) && is_file($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);
            $data['imagen'] = 'uploads/' . $newName;
        }

        $model->update($id, $data);
        return redirect()->to('/index.php/celulares');
    }

    public function delete($id)
    {
        $model = new CelularModel();

        // Borrar la imagen asociada antes de eliminar el registro
        $existing = $model->find($id);
        if ($existing && ! empty($existing['imagen'])) {
            $oldPath = FCPATH . $existing['imagen'];
            if (file_exists($oldPath) && is_file($oldPath)) {
                @unlink($oldPath);
            }
        }

        $model->delete($id);
        return redirect()->to('/index.php/celulares');
    }
}
