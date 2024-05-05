<?php

include("KontrakPresenter.php");


class ProsesPasien implements KontrakPresenter
{
	private $tabelpasien;
	private $data = [];

	function __construct()
	{
		//konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); //instansi TabelPasien
			$this->data = array(); //instansi list untuk data Pasien
			//data = new ArrayList<Pasien>;//instansi list untuk data Pasien
		} catch (Exception $e) {
			echo "wiw error" . $e->getMessage();
		}
	}

	function prosesDataPasien()
	{
		try {
			//mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->getPasien();
			while ($row = $this->tabelpasien->getResult()) {
				//ambil hasil query
				$pasien = new Pasien(); //instansiasi objek pasien untuk setiap data pasien
				$pasien->setId($row['id']); //mengisi id
				$pasien->setNik($row['nik']); //mengisi nik
				$pasien->setNama($row['nama']); //mengisi nama
				$pasien->setTempat($row['tempat']); //mengisi tempat
				$pasien->setTl($row['tl']); //mengisi tl
				$pasien->setGender($row['gender']); //mengisi gender
				$pasien->setEmail($row['email']); //mengisi email
				$pasien->setTelepon($row['telp']); //mengisi telepon


				$this->data[] = $row; //tambahkan data pasien ke dalam list
			}
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}
	function prosesAddDataPasien($data)
	{
		$newPasien = new Pasien();
		$newPasien->setNik($data['NIK']);
		$newPasien->setNama($data['nama']);
		$newPasien->setTempat($data['tempat']);
		$newPasien->setTl($data['tanggal_lahir']);
		$newPasien->setGender($data['gender']);
		$newPasien->setEmail($data['email']);
		$newPasien->setTelepon($data['telp']);

		$this->tabelpasien->open();
		$this->tabelpasien->addPasien($newPasien);
		$this->tabelpasien->close();

		header('location:index.php');
	}
	function prosesDataPasienById($id)
	{
		$this->tabelpasien->open();
		$this->tabelpasien->getPasienById($id);

		$pasien = new Pasien(); //instansiasi objek pasien untuk setiap data pasien
		while ($row = $this->tabelpasien->getResult()) {
			//ambil hasil query
			$pasien = new Pasien(); //instansiasi objek pasien untuk setiap data pasien
			$pasien->setId($row['id']); //mengisi id
			$pasien->setNik($row['nik']); //mengisi nik
			$pasien->setNama($row['nama']); //mengisi nama
			$pasien->setTempat($row['tempat']); //mengisi tempat
			$pasien->setTl($row['tl']); //mengisi tl
			$pasien->setGender($row['gender']); //mengisi gender
			$pasien->setEmail($row['email']); //mengisi email
			$pasien->setTelepon($row['telp']); //mengisi telepon


			$this->data[] = $row; //tambahkan data pasien ke dalam list
		}
		$this->tabelpasien->close();
	}
	function prosesEditDataPasien($data)
	{
		$idPasien = $data['id'];
		$editedPasien = new Pasien();
		$editedPasien->setNik($data['NIK']);
		$editedPasien->setNama($data['nama']);
		$editedPasien->setTempat($data['tempat']);
		$editedPasien->setTl($data['tanggal_lahir']);
		$editedPasien->setGender($data['gender']);
		$editedPasien->setEmail($data['email']);
		$editedPasien->setTelepon($data['telp']);

		$this->tabelpasien->open();
		$this->tabelpasien->editPasien($idPasien, $editedPasien);
		$this->tabelpasien->close();

		header('location:index.php');
	}
	function prosesDeleteDataPasien($id)
	{
		$this->tabelpasien->open();
		$this->tabelpasien->deletePasien($id);
		$this->tabelpasien->close();

		header('location:index.php');
	}
	function getId($i)
	{
		//mengembalikan id Pasien dengan indeks ke i
		return $this->data[$i]['id'];
	}
	function getNik($i)
	{
		//mengembalikan nik Pasien dengan indeks ke i
		return $this->data[$i]['nik'];
	}
	function getNama($i)
	{
		//mengembalikan nama Pasien dengan indeks ke i
		return $this->data[$i]['nama'];
	}
	function getTempat($i)
	{
		//mengembalikan tempat Pasien dengan indeks ke i
		return $this->data[$i]['tempat'];
	}
	function getTl($i)
	{
		//mengembalikan tanggal lahir(TL) Pasien dengan indeks ke i
		return $this->data[$i]['tl'];
	}
	function getGender($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['gender'];
	}
	function getEmail($i)
	{
		//mengembalikan email Pasien dengan indeks ke i
		return $this->data[$i]['email'];
	}
	function getTelepon($i)
	{
		//mengembalikan email Pasien dengan indeks ke i
		return $this->data[$i]['telp'];
	}
	function getSize()
	{
		return sizeof($this->data);
	}
}
