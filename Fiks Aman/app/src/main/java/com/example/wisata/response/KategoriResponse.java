package com.example.wisata.response;

import com.example.wisata.model.KategoriModel;
import com.google.gson.annotations.SerializedName;

import java.util.List;

public class KategoriResponse {
@SerializedName("kategori") private List<KategoriModel> allkategori;

public List<KategoriModel> getAllkategori(){
    return allkategori;
}
}
