package com.example.wisata.aktivity;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Toast;

import com.example.wisata.R;
import com.example.wisata.adapter.KategoriAdapter;
import com.example.wisata.api.BaseApiService;
import com.example.wisata.api.RestClient;
import com.example.wisata.model.KategoriModel;
import com.example.wisata.response.KategoriResponse;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity {
    BaseApiService mApiService;
    Context context;
    List<KategoriModel>kategoriModelList;
    KategoriAdapter adapterkategori;
    RecyclerView rvKategori;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        context =this;
        mApiService = RestClient.ApiService();
        rvKategori = (RecyclerView)findViewById(R.id.rvKategori);

        getkategori();
    }

    private void getkategori() {
        rvKategori.setVisibility(View.GONE);
        kategoriModelList = new ArrayList<>();
        adapterkategori = new KategoriAdapter(this, kategoriModelList);

        rvKategori.setLayoutManager(new GridLayoutManager(this, 2));
        rvKategori.setAdapter(adapterkategori);
        Call<KategoriResponse> rest = mApiService.getKategori();
        rest.enqueue(new Callback<KategoriResponse>() {
            @Override
            public void onResponse(Call<KategoriResponse> call, Response<KategoriResponse> response) {
                    if (response.isSuccessful()){
                    rvKategori.setVisibility(View.VISIBLE);
                    kategoriModelList.clear();
                    kategoriModelList.addAll(response.body().getAllkategori());
                    adapterkategori.notifyDataSetChanged();
                    }else{
                        Toast.makeText(context, "Belum ada data yang terbaca", Toast.LENGTH_SHORT).show();
                    }
            }

            @Override
            public void onFailure(Call<KategoriResponse> call, Throwable t) {
                Toast.makeText(context, "Koneksi Bermasalah", Toast.LENGTH_SHORT).show();
                Log.d("errork", "onFailure: " + t);

            }
        });

        adapterkategori.setOnKatClikListener(new KategoriAdapter.onKatClikListener() {
            @Override
            public void onKatClick(int index) {
                KategoriModel getKategori = kategoriModelList.get(index);
                Intent in = new Intent(context,WisataActivity.class);
                in.putExtra("id_kategori", getKategori.getIdKategori());
                startActivity(in);
            }
        });




    }
}