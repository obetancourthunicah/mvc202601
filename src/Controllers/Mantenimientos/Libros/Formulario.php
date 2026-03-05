<?php

namespace Controllers\Mantenimientos\Libros;

use Dao\Mantenimientos\Libros as LibrosDAO;
use Controllers\PublicController;
use Views\Renderer;
use Utilities\Site;

const LIBROS_FORMULARIO_URL = "index.php?page=Mantenimiento-Libros-Formulario";
const LIBROS_LISTADO_URL = "index.php?page=Mantenimiento-Libros-Listado";

class Formulario extends PublicController
{
    private array $viewData = [];
    private array $modes = [
        "INS" => "Nuevo Libro",
        "UPD" => "Actualizar %s %s",
        "DSP" => "Detalle de %s %s",
        "DEL" => "Elminando %s %s"
    ];

    private $id;
    private $titulo;
    private $resumen;
    private $autor;
    private $fecha_publicacion;
    private $genero;
    private $precio;

    private $mode;

    public function run(): void
    {
        /*
        Procesar Gets del Formulario (Modo, Id?)
        If Is Postback
            Capturar Datos del Formulario
            Validar los Datos del Formulario
            Realizar la acccion del CRUD
            Redirigir a la Lista
        endif
        Si (id !== "") 
            obtener datos del Libro
            generar ViewData
        endif
        Renderizar el formulario.
        */
        $this->LoadPage();

        $this->GenerarViewData();
        Renderer::render("mantenimientos/libros/formulario", $this->viewData);
    }

    private function LoadPage()
    {
        $this->mode = $_GET["mode"] ?? '';
        if (!isset($this->modes[$this->mode])) {
            Site::redirectToWithMsg(LIBROS_LISTADO_URL, "Error al cargar formulario, Intente de nuevo");
        }
        $this->id = intval($_GET["id"] ?? '0');
        if ($this->mode !== "INS" && $this->id <= 0) {
            Site::redirectToWithMsg(LIBROS_LISTADO_URL, "Error al cargar formulario, Se requiere Id del Libro");
        } else {
            if ($this->mode !== "INS") {
                $this->CargarDatos();
            }
        }
    }
    private function CargarDatos()
    {
        $tmpLibros = LibrosDAO::getLibroById($this->id);
        if (count($tmpLibros) <= 0) {
            Site::redirectToWithMsg(LIBROS_LISTADO_URL, "No se encontró el Libro");
        }
        $this->titulo = $tmpLibros["titulo"];
        $this->resumen = $tmpLibros["resumen"];
        $this->autor = $tmpLibros["autor"];
        $this->fecha_publicacion = $tmpLibros["fecha_publicacion"];
        $this->genero = $tmpLibros["genero"];
        $this->precio = $tmpLibros["precio"];
    }
    private function GenerarViewData()
    {
        $this->viewData["mode"] = $this->mode;
        $this->viewData["modeDsc"]  = sprintf($this->modes[$this->mode], $this->id, $this->titulo);
        $this->viewData["id"] = $this->id;
        $this->viewData["titulo"] = $this->titulo;
        $this->viewData["resumen"] = $this->resumen;
        $this->viewData["autor"] = $this->autor;
        $this->viewData["fecha_publicacion"] = $this->fecha_publicacion;
        $this->viewData["genero"] = $this->genero;
        $this->viewData["precio"] = $this->precio;
    }
}
