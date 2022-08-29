package com.example.wisata.model;

import com.google.gson.annotations.SerializedName;

public class WisataModel {
    @SerializedName("id_wisata") String idWisata;
    @SerializedName("nama_wisata") String namaWisata;
    @SerializedName("detail") String Detail;
    @SerializedName("alamat") String Alamat;
    @SerializedName("jam_buka") String jamBuka;
    @SerializedName("foto") String Foto;
    @SerializedName("id_kategori") String idKategori;


    public String getIdWisata() {
        return idWisata;
    }

    public String getNamaWisata() {
        return namaWisata;
    }

    public String getDetail() {
        return Detail;
    }

    public String getAlamat() {
        return Alamat;
    }

    public String getJamBuka() {
        return jamBuka;
    }

    public String getFoto() {
        return Foto;
    }

    public String getIdKategori() {
        return idKategori;
    }



}
