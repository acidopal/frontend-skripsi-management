<?php

namespace App\DataTransferObject;

class KaprodiDTO
{
    private $nidn;
    private $kode_prodi;


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
}
    