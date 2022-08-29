package com.example.wisata.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

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

        int index =position;
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (onWisClickListener != null){
                    onWisClickListener.onWisClickListener(index);
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

        public WisataViewHolder(@NonNull View itemView) {
            super(itemView);
            namaWisata = itemView.findViewById(R.id.nama_wisata);
        }
    }
    public interface onWisClickListener{
      void onWisClickListener(int index);
    }

    public void setOnWisClickListener(onWisClickListener onWisClickListener){
        this.onWisClickListener = onWisClickListener;
    }
}

