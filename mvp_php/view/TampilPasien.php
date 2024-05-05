<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelepon($i) . "</td>
			<td>
                  <a class='btn btn-success' href='index.php?id_edit=".$this->prosespasien->getId($i)."'>Edit</a>
                  <a class='btn btn-danger' href='index.php?id_delete=".$this->prosespasien->getId($i)."'>Delete</a>
                </td><tr>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
	function tampilCreate()
	{
		$dataFormField = "
		<label for='NIK'>NIK</label>
		<input type='text' class='form-control' name='NIK'></input>
		<label for='Nama'>Nama</label>
		<input type='text' class='form-control' name='nama'></input>
		<label for='tempat'>Tempat</label>
		<input type='text' class='form-control' name='tempat'></input>
		<label for='tanggal_lahir'>Tanggal Lahir</label>
		<input type='date' class='form-control' name='tanggal_lahir'></input>
		<label for='gender'>Gender</label>
		<select class='form-select' name='gender'>
		<option value='Laki-laki'>Laki-laki</option>
		<option value='Perempuan'>Perempuan</option>
		</select>
		<label for='email'>Email</label>
		<input type='text' class='form-control' name='email'></input>
		<label for='telp'>Telepon</label>
		<input type='number' class='form-control' name='telp'></input>
		<button type='submit' class='btn btn-primary my-3 w-100' name='add'>Submit</button>
		";

		// Membaca template skin.html
		$this->tpl = new Template("templates/createEdit.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_FORM_ACTION", "create.php");
		$this->tpl->replace("DATA_FORM_FIELD", $dataFormField);

		// Menampilkan ke layar
		$this->tpl->write();
	}
	function addPasien($data){
		$this->prosespasien->prosesAddDataPasien($data);
	}
	function tampilEdit($id){
		$this->prosespasien->prosesDataPasienById($id);

		$dataFormField = "
		<input type='hidden' name='id' value='".$this->prosespasien->getId(0)."'></input>
		<label for='NIK'>NIK</label>
		<input type='text' class='form-control' name='NIK' value='".$this->prosespasien->getNik(0)."'></input>
		<label for='Nama'>Nama</label>
		<input type='text' class='form-control' name='nama' value='".$this->prosespasien->getNama(0)."'></input>
		<label for='tempat'>Tempat</label>
		<input type='text' class='form-control' name='tempat' value='".$this->prosespasien->getTempat(0)."'></input>
		<label for='tanggal_lahir'>Tanggal Lahir</label>
		<input type='date' class='form-control' name='tanggal_lahir' value='".$this->prosespasien->getTl(0)."'></input>
		<label for='gender'>Gender</label>
		<select class='form-select' name='gender'>
		<option value='Laki-laki'>Laki-laki</option>
		<option value='Perempuan'";
		if($this->prosespasien->getGender(0) == "Perempuan"){
			$dataFormField .= "selected";
		}
		$dataFormField .= ">Perempuan</option>
		</select>
		<label for='email'>Email</label>
		<input type='text' class='form-control' name='email' value='".$this->prosespasien->getEmail(0)."'></input>
		<label for='telp'>Telepon</label>
		<input type='number' class='form-control' name='telp' value='".$this->prosespasien->getTelepon(0)."'></input>
		<button type='submit' class='btn btn-primary my-3 w-100' name='edit'>Edit</button>
		";

		// Membaca template skin.html
		$this->tpl = new Template("templates/createEdit.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_FORM_ACTION", "index.php");
		$this->tpl->replace("DATA_FORM_FIELD", $dataFormField);

		// Menampilkan ke layar
		$this->tpl->write();
	}
	function editPasien($data){
		$this->prosespasien->prosesEditDataPasien($data);
	}
	function deletePasien($id)
	{
		$this->prosespasien->prosesDeleteDataPasien($id);
	}
}
