<?php

namespace App\DataTransferObject;

class PembimbingSkripsiDTO
{
    private $tgl_dosen_membimbing;
    private $nidn;
    private $id_skripsi;


    /**
     * @return mixed
     */
    public function getTglDosenMembimbing()
    {
        return $this->tgl_dosen_membimbing;
    }

    /**
     * @param mixed $tgl_dosen_membimbing
     *
     * @return self
     */
    public function setTglDosenMembimbing($tgl_dosen_membimbing)
    {
        $this->tgl_dosen_membimbing = $tgl_dosen_membimbing;

        return $this;
    }

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
    public function getIdSkripsi()
    {
        return $this->id_skripsi;
    }

    /**
     * @param mixed $id_skripsi
     *
     * @return self
     */
    public function setIdSkripsi($id_skripsi)
    {
        $this->id_skripsi = $id_skripsi;

        return $this;
    }
}