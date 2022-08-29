package com.example.wisata.aktivity;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Toast;

import com.example.wisata.R;
import com.example.wisata.adapter.WisataAdapter;
import com.example.wisata.api.BaseApiService;
import com.example.wisata.api.RestClient;
import com.example.wisata.model.WisataModel;
import com.example.wisata.response.WisataResponse;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class WisataActivity extends AppCompatActivity {

    BaseApiService mApiService;
    Context context;
    List<WisataModel> wisataModelList;
    WisataAdapter wisataAdapter;

    RecyclerView rvWisata;
    String tmpIdWisata;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_wisata);

        context = this;
        mApiService = RestClient.ApiService();

        rvWisata = (RecyclerView) findViewById(R.id.rvWisata);
        Intent get = getIntent();
        tmpIdWisata = get.getStringExtra("id_kstegori");
       getWisata();


    }

    private void getWisata() {

        rvWisata.setVisibility(View.GONE);
        wisataModelList = new ArrayList<>();
        wisataAdapter = new WisataAdapter(this, wisataModelList);

        rvWisata.setLayoutManager(new LinearLayoutManager(this));
        rvWisata.setAdapter(wisataAdapter);

        Call<WisataResponse> rest = mApiService.getWisata(tmpIdWisata);
        rest.enqueue(new Callback<WisataResponse>() {
            @Override
            public void onResponse(Call<WisataResponse> call, Response<WisataResponse> response) {
                if (response.isSuccessful()){
                    rvWisata.setVisibility(View.VISIBLE);
                    wisataModelList.clear();
                    wisataModelList.addAll(response.body().getAllwisata());
                    wisataAdapter.notifyDataSetChanged();
                }
            }

            @Override
            public void onFailure(Call<WisataResponse> call, Throwable t) {
                Toast.makeText(context, "Tidak Ada Wisata", Toast.LENGTH_SHORT).show();
                Log.d("wisata_err", "onFailed" + t);

            }
        });
    }


    }
}