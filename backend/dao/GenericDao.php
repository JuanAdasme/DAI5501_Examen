<?php

interface GenericDao{

  public function buscarPorId($id);

  public function agregarRegistro($registro);

  public function eliminarRegistro($id);

  public function listarTodos();


}
