package com.example.wisata.api;

import java.util.concurrent.TimeUnit;

import okhttp3.OkHttpClient;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class RestClient {
public static final String IPCONFIG = "10.40.75.104";
public  static final  String BASE_URL = "http://"+ IPCONFIG + "/API/";

public static BaseApiService ApiService(){
    OkHttpClient.Builder builder =new OkHttpClient.Builder();

    builder.readTimeout(3000, TimeUnit.MILLISECONDS);
    builder.connectTimeout(3000, TimeUnit.MILLISECONDS);

    BaseApiService retrofit = new Retrofit.Builder()
            .baseUrl(BASE_URL)
            .client(builder.build())
            .addConverterFactory(GsonConverterFactory.create())
            .build().create(BaseApiService.class);
    return retrofit;
}

}
