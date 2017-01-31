<?php
class MarcaVehiculo {
	private $id;
	private $marca_vehiculo;
	public function __construct($id, $marca_vehiculo) {
		$this->id = $id;
		$this->marca_vehiculo = $marca_vehiculo;
	}
	public function getId() {
		return $this->id;
	}
	public function getMarcaVehiculo() {
		return $this->marca_vehiculo;
	}
}

?>