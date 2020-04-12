<?php

namespace App\DataTransferObject;

class BimbinganSkripsiDTO
{
    private $pertemuan_ke;
    private $tanggal;
    private $topik_bahasan;
    private $kpi;
    private $penyelesaian;
    private $jadwal_berikutnya;
    private $persetujuan;
    private $tgl_persetujuan;
    private $komentar_pembimbing;
    private $id_bimbingan;
    private $nidn;
    private $id_skripsi;


    /**
     * @return mixed
     */
    public function getPertemuanKe()
    {
        return $this->pertemuan_ke;
    }

    /**
     * @param mixed $pertemuan_ke
     *
     * @return self
     */
    public function setPertemuanKe($pertemuan_ke)
    {
        $this->pertemuan_ke = $pertemuan_ke;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTanggal()
    {
        return $this->tanggal;
    }

    /**
     * @param mixed $tanggal
     *
     * @return self
     */
    public function setTanggal($tanggal)
    {
        $this->tanggal = $tanggal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTopikBahasan()
    {
        return $this->topik_bahasan;
    }

    /**
     * @param mixed $topik_bahasan
     *
     * @return self
     */
    public function setTopikBahasan($topik_bahasan)
    {
        $this->topik_bahasan = $topik_bahasan;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getKpi()
    {
        return $this->kpi;
    }

    /**
     * @param mixed $kpi
     *
     * @return self
     */
    public function setKpi($kpi)
    {
        $this->kpi = $kpi;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPenyelesaian()
    {
        return $this->penyelesaian;
    }

    /**
     * @param mixed $penyelesaian
     *
     * @return self
     */
    public function setPenyelesaian($penyelesaian)
    {
        $this->penyelesaian = $penyelesaian;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getJadwalBerikutnya()
    {
        return $this->jadwal_berikutnya;
    }

    /**
     * @param mixed $jadwal_berikutnya
     *
     * @return self
     */
    public function setJadwalBerikutnya($jadwal_berikutnya)
    {
        $this->jadwal_berikutnya = $jadwal_berikutnya;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPersetujuan()
    {
        return $this->persetujuan;
    }

    /**
     * @param mixed $persetujuan
     *
     * @return self
     */
    public function setPersetujuan($persetujuan)
    {
        $this->persetujuan = $persetujuan;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTglPersetujuan()
    {
        return $this->tgl_persetujuan;
    }

    /**
     * @param mixed $tgl_persetujuan
     *
     * @return self
     */
    public function setTglPersetujuan($tgl_persetujuan)
    {
        $this->tgl_persetujuan = $tgl_persetujuan;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getKomentarPembimbing()
    {
        return $this->komentar_pembimbing;
    }

    /**
     * @param mixed $komentar_pembimbing
     *
     * @return self
     */
    public function setKomentarPembimbing($komentar_pembimbing)
    {
        $this->komentar_pembimbing = $komentar_pembimbing;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdBimbingan()
    {
        return $this->id_bimbingan;
    }

    /**
     * @param mixed $id_bimbingan
     *
     * @return self
     */
    public function setIdBimbingan($id_bimbingan)
    {
        $this->id_bimbingan = $id_bimbingan;

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