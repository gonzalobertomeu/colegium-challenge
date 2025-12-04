<?php
/*
* Tarea: Crear un metodo en la clase Retiros que obtenga los retiros de los estudiantes asociados a un tutor.
*
/*
    * El metodo debe cumplir con los siguientes requerimientos:
    *
    * @param string $tutorId ID del tutor.
    * @return array Array de objetos con los retiros de los estudiantes del tutor.
    * Ejemplo de return:
    * [
    *  estudianteId1 => [
    *      estudiante => (object) [
    *          id => estudianteId1,
    *          nombre => 'Juan',
    *          apellido => 'Perez',
    *      ],
    *      retiros => [
    *          (object) [
    *              id => retiro1,
    *              nombre => 'Retiro 1',
    *              fecha => '2020-01-01'
    *          ],
    *          (object) [
    *              id => retiro2,
    *              nombre => 'Retiro 2',
    *              fecha => '2020-01-02'
    *          ],
    *      ]
    *  ],
    *  estudianteId2 => [
    *      estudiante => (object) [
    *          id => estudianteId2,
    *          nombre => 'Maria',
    *          apellido => 'Gomez',
    *      ],
    *      retiros => [
    *          (object) [
    *              id => retiro3,
    *              nombre => 'Retiro 3',
    *              fecha => '2020-01-03'
    *          ],
    *      ]
    *  ]
    * ]
*/
class Retiros
{
  /**
  * Entrypoint
  */
  public static function main() {
    $result = (object) [];
    /**
    * Tu codigo aquí
    */
    var_dump($result);
  }

  /**
  * (opcional) Métodos auxiliares
  */
}
Retiros::main();



/**
* Clases auxiliares
*/
class DB
{
  public static function estudiantes () {
    $estudiantes = [
      (object) [
        'id' => 'a',
        'nombre' => 'Juan',
        'apellido' => 'Perez',
        'tutor_principal_id' => 'd'
      ],
      (object) [
        'id' => 'b',
        'nombre' => 'Maria',
        'apellido' => 'Gomez',
        'tutor_principal_id' => 'd'
      ],
      (object) [
        'id' => 'c',
        'nombre' => 'Pedro',
        'apellido' => 'Gonzalez',
        'tutor_principal_id' => 'e'
      ],
    ];
    return new DB_result($estudiantes);
  }
 
  public static function tutores () {
    $tutores = [
      (object) [
        'id' => 'd',
        'nombre' => 'Santiago',
        'apellido' => 'Perez',
        'email' => 'santiago@gmail.com'
      ],
      (object) [
        'id' => 'e',
        'nombre' => 'Ana',
        'apellido' => 'Gomez',
        'email' => 'ana@gmail.com'
      ],
    ];
    return new DB_result($tutores);
  }
 
  public static function tutores_estudiantes () {
    $tutores_estudiantes = [
      (object) [
        'id' => 'f',
        'tutor_id' => 'd',
        'estudiante_id' => 'a'
      ],
      (object) [
        'id' => 'g',
        'tutor_id' => 'd',
        'estudiante_id' => 'b'
      ],
      (object) [
        'id' => 'h',
        'tutor_id' => 'e',
        'estudiante_id' => 'c'
      ],
    ];
    return new DB_result($tutores_estudiantes);
  }
 
  public static function retiros () {
    $retiros = [
      (object) [
        'id' => 'i',
        'nombre' => 'Retiro 1',
        'fecha' => '2020-01-01'
      ],
      (object) [
        'id' => 'j',
        'nombre' => 'Retiro 2',
        'fecha' => '2020-01-02'
      ],
      (object) [
        'id' => 'k',
        'nombre' => 'Retiro 3',
        'fecha' => '2020-01-03'
      ],
    ];
    return new DB_result($retiros);
  }
 
  public static function retiros_estudiantes () {
    $retiros_estudiantes = [
      (object) [
        'id' => 'l',
        'retiro_id' => 'i',
        'estudiante_id' => 'a'
      ],
      (object) [
        'id' => 'm',
        'retiro_id' => 'j',
        'estudiante_id' => 'b'
      ],
      (object) [
        'id' => 'n',
        'retiro_id' => 'k',
        'estudiante_id' => 'c'
      ],
    ];
    return new DB_result($retiros_estudiantes);
  }
}

class DB_result
{ private $data = [];

  public function __construct($data) {
    usleep(500000);
    $this->data = $data;
  }

  public function result() {
    return $this->data;
  }

  public function get($id) {
    $element = array_filter($this->data, function($element) use($id) {
      return $element->id == $id;
    });
    if (count($element != 1)) {
      throw new Exception("Element not found");
    }
    return $element[0];
  }

  public function filter($key, $value) {
    $this->data = array_filter($this->data, function($element) use($key, $value){
      return $element->$key == $value;
    });
    return $this;
  }
}
