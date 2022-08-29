package com.example.wisata.api;

import com.example.wisata.response.KategoriResponse;
import com.example.wisata.response.WisataResponse;

import retrofit2.Call;
import retrofit2.http.GET;
import retrofit2.http.Query;

public interface BaseApiService {
    @GET("tampilkategori.php")
    Call<KategoriResponse> getKategori();

    @GET("tampilwisata.php")
    Call<WisataResponse> getWisata(@Query("id_kategori") String idWisata);
}
