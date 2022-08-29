package com.example.wisata.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.wisata.R;
import com.example.wisata.model.KategoriModel;

import java.util.List;

public class KategoriAdapter extends RecyclerView.Adapter<KategoriAdapter.KategoriViewHolder> {
    Context contex;
    List<KategoriModel> kategoriModelList;


    private  onKatClikListener onKatClikListener;
    public KategoriAdapter(Context contex, List<KategoriModel> kategoriModelList) {
        this.contex = contex;
        this.kategoriModelList = kategoriModelList;
    }

    @NonNull
    @Override
    public KategoriViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext()).inflate(R.layout.itemview, parent, false);
        return new KategoriViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(@NonNull KategoriViewHolder holder, int position) {
        final KategoriModel getkategori = kategoriModelList.get(position);
        holder.namaKategori.setText(getkategori.getNamaKategori());

        int index = position;
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (onKatClikListener != null){
                    onKatClikListener.onKatClick(index);
                }
            }
        });
    }

    @Override
    public int getItemCount() {
       return kategoriModelList.size();
    }

    public class KategoriViewHolder extends RecyclerView.ViewHolder {
    TextView namaKategori;

    public KategoriViewHolder(@NonNull View itemView) {
        super(itemView);
        namaKategori =itemView.findViewById(R.id.nama_kategori);
    }
}

    public interface onKatClikListener{
        void onKatClick(int index);
    }

    public void setOnKatClikListener(onKatClikListener onKatClikListener){
        this.onKatClikListener =onKatClikListener;
    }
}
