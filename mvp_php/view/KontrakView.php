<?php

interface KontrakView{
	public function tampil();
	public function tampilCreate();
	public function addPasien($data);
	public function tampilEdit($id);
	public function editPasien($data);
	public function deletePasien($id);
}

?>