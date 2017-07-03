<?php

interface GenericDao{

  public function buscarPorId($id);

  public function agregarRegistro($registros);

  public function eliminarRegistro($registros);

  public function listarTodos($registros);


}
