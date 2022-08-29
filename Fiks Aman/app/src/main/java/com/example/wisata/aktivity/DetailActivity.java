package com.example.wisata.aktivity;

import static com.example.wisata.api.RestClient.BASE_IMG_URL;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.example.wisata.R;
import com.example.wisata.model.WisataModel;

import java.util.List;

public class DetailActivity extends AppCompatActivity {

    TextView namaWisata;
    TextView JamBuka;
    TextView alamat;
    TextView detail;
    ImageView gambar;
    String image;
    String jam  ="Jam Buka : ";
    String al ="Alamat      : ";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail);

        namaWisata = findViewById(R.id.name);
        JamBuka = findViewById(R.id.jam);
        alamat = findViewById(R.id.alamat);
        detail = findViewById(R.id.detail);
        gambar = findViewById(R.id.gambar);



        Intent get = getIntent();
        namaWisata.setText(get.getStringExtra("nama_wisata"));
        JamBuka.setText(jam + get.getStringExtra("jam_buka"));
        alamat.setText(al + get.getStringExtra("alamat_wisata"));
        detail.setText(get.getStringExtra("detail"));
        image = get.getStringExtra("foto");

        Glide.with(DetailActivity.this)
                .load(BASE_IMG_URL + image)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(gambar);


    }

}