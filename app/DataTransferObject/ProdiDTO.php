<?php

namespace App\DataTransferObject;

class ProdiDTO
{
    private $kode_prodi;
    private $nama_prodi;


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
    public function getNamaProdi()
    {
        return $this->nama_prodi;
    }

    /**
     * @param mixed $nama_prodi
     *
     * @return self
     */
    public function setNamaProdi($nama_prodi)
    {
        $this->nama_prodi = $nama_prodi;

        return $this;
    }
}