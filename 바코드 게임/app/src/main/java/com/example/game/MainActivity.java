package com.example.game;
import android.content.Intent;
import android.media.MediaPlayer;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

public class MainActivity extends AppCompatActivity {
    private static MediaPlayer bgm;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        bgm = MediaPlayer.create(this,R.raw.bgm2);
        bgm.setLooping(true);
        bgm.start();
    }


    public void startbtn(View v){
        Intent i = new Intent(this,Main2Activity.class);
        startActivity(i);
    }
}
