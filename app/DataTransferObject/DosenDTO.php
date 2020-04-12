<?php

namespace App\DataTransferObject;

class DosenDTO
{
    private $nidn;
    private $nama;
    private $gender;
    private $alamat;
    private $no_telp;
    private $kode_prodi;
    private $user_id;

    /**
     * @return mixed
     */
    public function getNidn()
    {
        return $this->nidn;
    }

    /**
     * @param mixed $nidn
     *
     * @return self
     */
    public function setNidn($nidn)
    {
        $this->nidn = $nidn;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * @param mixed $nama
     *
     * @return self
     */
    public function setNama($nama)
    {
        $this->nama = $nama;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     *
     * @return self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAlamat()
    {
        return $this->alamat;
    }

    /**
     * @param mixed $alamat
     *
     * @return self
     */
    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoTelp()
    {
        return $this->no_telp;
    }

    /**
     * @param mixed $no_telp
     *
     * @return self
     */
    public function setNoTelp($no_telp)
    {
        $this->no_telp = $no_telp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getKodeProdi()
    {
        return $this->kode_prodi;
    }

    /**
     * @param mixed $kode_prodi
     *
     * @return self
     */
    public function setKodeProdi($kode_prodi)
    {
        $this->kode_prodi = $kode_prodi;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     *
     * @return self
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
}