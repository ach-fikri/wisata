package com.example.wisata.response;

import com.example.wisata.model.WisataModel;
import com.google.gson.annotations.SerializedName;

import java.util.List;

public class WisataResponse {
    @SerializedName("wisata") private List<WisataModel> allwisata;
    public List<WisataModel> getAllwisata(){
        return allwisata;
    }
}
