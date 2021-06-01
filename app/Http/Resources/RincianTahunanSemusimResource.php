<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\RincianTahunanSemusim;
use App\Models\KebunTahunanSemusim;

class RincianTahunanSemusimResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = RincianTahunanSemusim::find($this->id);
        return [
            'id'    => $this->id,
            'survei_id'    => $this->survei_id,
            'kode_tanaman'    => $this->kode_tanaman,
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
            'list_kebun_semusim_sendiri'    => KebunTahunanSemusim::where('survei_id', '=', $this->survei_id)->where('rincian_id', '=', $this->id)->where('jenis', '=', 1)->get(),
            'list_kebun_semusim_plasma'    => KebunTahunanSemusim::where('survei_id', '=', $this->survei_id)->where('rincian_id', '=', $this->id)->where('jenis', '=', 2)->get()
        ];
    }
}
