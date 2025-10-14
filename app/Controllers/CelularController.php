<?php

namespace App\Controllers;

use App\Models\CelularModel;

class CelularController extends BaseController
{
    public function index()
    {
        $model = new CelularModel();
        $data['celulares'] = $model->findAll();
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

        return redirect()->to('/celulares');
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
        return redirect()->to('/celulares');
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
        return redirect()->to('/celulares');
    }
}
