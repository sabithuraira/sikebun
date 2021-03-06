<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\RincianTahunanTahun;
use App\Models\KebunTahunanTahun;

class RincianTahunanTahunResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = RincianTahunanTahun::find($this->id);
        return [
            'id'    => $this->id,
            'survei_id'    => $this->survei_id,
            'kode_tanaman'    => $this->kode_tanaman,
            'tanaman_diolah'    => $this->tanaman_diolah,
            'luas_sendiri_5'    => $this->luas_sendiri_5,
            'luas_sendiri_5_10'    => $this->luas_sendiri_5_10,
            'luas_sendiri_11_25'    => $this->luas_sendiri_11_25,
            'luas_sendiri_25'    => $this->luas_sendiri_25,
            'luas_plasma_5'    => $this->luas_plasma_5,
            'luas_plasma_5_10'    => $this->luas_plasma_5_10,
            'luas_plasma_11_25'    => $this->luas_plasma_11_25,
            'luas_plasma_25'    => $this->luas_plasma_25,
            
            'sendiri_bentuk_produksi'    => $this->sendiri_bentuk_produksi,
            'sendiri_rata_rendemen'    => $this->sendiri_rata_rendemen,
            'plasma_bentuk_produksi'    => $this->plasma_bentuk_produksi,
            'plasma_rata_rendemen'    => $this->plasma_rata_rendemen,
            'bibit_tanaman'    => $this->bibit_tanaman,
            'pupuk1'    => $this->pupuk1,
            'pupuk2'    => $this->pupuk2,
            'pupuk3'    => $this->pupuk3,
            'pestisida1'    => $this->pestisida1,
            'pestisida2'    => $this->pestisida2,
            'pestisida3'    => $this->pestisida3,
            'bahan_bakar_budidaya'    => $this->bahan_bakar_budidaya,
            'sewa_lahan'    => $this->sewa_lahan,
            'sewa_alat'    => $this->sewa_alat,
            'pengeluaran_lainnya'    => $this->pengeluaran_lainnya,
            'biaya_kemitraan'    => $this->biaya_kemitraan,

            'nama_produk_utama'    => $this->nama_produk_utama,
            'kbki_produk_utama'    => $this->kbki_produk_utaman,

            'list_kebun_tahunan_sendiri'    => KebunTahunanTahun::where('survei_id', '=', $this->survei_id)->where('rincian_id', '=', $this->id)->where('jenis', '=', 1)->get(),
            'list_kebun_tahunan_plasma'    => KebunTahunanTahun::where('survei_id', '=', $this->survei_id)->where('rincian_id', '=', $this->id)->where('jenis', '=', 2)->get()
        ];
    }
}
