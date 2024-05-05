<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function getPasienById($id)
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien WHERE id = $id";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function addPasien($pasien){
		$NIK = $pasien->getNik();
		$nama = $pasien->getNama();
		$tempat = $pasien->getTempat();
		$tl = $pasien->getTl();
		$gender = $pasien->getGender();
		$email = $pasien->getEmail();
		$telp = $pasien->getTelepon();
		$query = "INSERT INTO pasien VALUES(null, '$NIK', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
		return $this->execute($query);
	}
	function editPasien($id, $pasien){
		$NIK = $pasien->getNik();
		$nama = $pasien->getNama();
		$tempat = $pasien->getTempat();
		$tl = $pasien->getTl();
		$gender = $pasien->getGender();
		$email = $pasien->getEmail();
		$telp = $pasien->getTelepon();
		$query = "UPDATE pasien SET nik = '$NIK', nama = '$nama', tempat = '$tempat', tl = '$tl', gender = '$gender', email = '$email', telp = '$telp' WHERE id = $id";
		return $this->execute($query);
	}
	function deletePasien($id){
		$query = "DELETE FROM pasien WHERE id = $id";
		return $this->execute($query);
	}
}
