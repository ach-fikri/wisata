package com.example.wisata.model;

import com.google.gson.annotations.SerializedName;

public class KategoriModel {
    @SerializedName("id_kategori") String idKategori;
    @SerializedName("nama_kategori") String namaKategori;

    public String getIdKategori() {
        return idKategori;
    }

    public String getNamaKategori() {
        return namaKategori;
    }
}
