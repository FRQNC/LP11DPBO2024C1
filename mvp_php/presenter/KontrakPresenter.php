<?php


interface KontrakPresenter
{
	public function prosesDataPasien();
	public function prosesAddDataPasien($data);
	public function prosesDataPasienById($id);
	public function prosesEditDataPasien($data);
	public function prosesDeleteDataPasien($id);
	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getTelepon($i);
	public function getSize();
}
