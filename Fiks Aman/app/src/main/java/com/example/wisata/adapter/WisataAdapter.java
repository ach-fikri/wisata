package com.example.wisata.adapter;

import static com.example.wisata.api.RestClient.BASE_IMG_URL;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.example.wisata.R;
import com.example.wisata.model.WisataModel;

import java.util.List;

public class WisataAdapter extends RecyclerView.Adapter<WisataAdapter.WisataViewHolder> {

    Context context;
    List<WisataModel> wisataModelList;
    private onWisClickListener onWisClickListener;

    public WisataAdapter(Context context, List<WisataModel> wisataModelList) {
        this.context = context;
        this.wisataModelList = wisataModelList;
    }


    @NonNull
    @Override
    public WisataAdapter.WisataViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
       View itemView = LayoutInflater.from(parent.getContext()).inflate(R.layout.itemview_wisata, parent, false);
       return new WisataViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(@NonNull WisataAdapter.WisataViewHolder holder, int position) {
        final WisataModel get = wisataModelList.get(position);
        holder.namaWisata.setText(get.getNamaWisata());
        Glide.with(context)
                .load(BASE_IMG_URL + get.getFoto())
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(holder.gambar);

        int index = position;
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (onWisClickListener != null){
                    onWisClickListener.onWisClick(index);
                }
            }
        });

    }

    @Override
    public int getItemCount() {
        return wisataModelList.size();
    }


    public class WisataViewHolder extends RecyclerView.ViewHolder {
        TextView namaWisata;
        ImageView gambar;
        public WisataViewHolder(@NonNull View itemView) {
            super(itemView);
            namaWisata = itemView.findViewById(R.id.nama_wisata);
            gambar = itemView.findViewById(R.id.foto);
        }
    }
    public interface onWisClickListener{
      void onWisClick(int index);
    }

    public void setOnClikListener(onWisClickListener onWisClickListener){
        this.onWisClickListener = onWisClickListener;
    }
}

