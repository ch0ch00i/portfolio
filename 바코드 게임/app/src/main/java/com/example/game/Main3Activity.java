package com.example.game;

import android.app.Dialog;
import android.content.Intent;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageButton;

import java.util.Random;

public class Main3Activity extends AppCompatActivity {

    ImageButton imageButton5;
    ImageButton imageButton6;
    ImageButton imageButton7;
    ImageButton imageButton8;
    ImageButton imageButton9;
    ImageButton imageButton10;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main3);

        imageButton5=(ImageButton) findViewById(R.id.imageButton5);
        imageButton6=(ImageButton) findViewById(R.id.imageButton6);
        imageButton7=(ImageButton) findViewById(R.id.imageButton7);
        imageButton8=(ImageButton) findViewById(R.id.imageButton8);
        imageButton9=(ImageButton) findViewById(R.id.imageButton9);
        imageButton10=(ImageButton) findViewById(R.id.imageButton10);
    }
    public void c1(View v){
        imageButton5.setImageResource(R.drawable.ba1_2);
    }
    public void c2(View v){
        imageButton6.setImageResource(R.drawable.ba2_2);
    }
    public void c3(View v){
        imageButton7.setImageResource(R.drawable.ba2_2);
    }
    public void c4(View v){
        imageButton8.setImageResource(R.drawable.ba3_2);
    }
    public void c5(View v){
        imageButton9.setImageResource(R.drawable.ba1_2);
    }
    public void c6(View v){
        imageButton10.setImageResource(R.drawable.ba2_2);
    }

    public void reset(View v){
        imageButton5.setImageResource(R.drawable.ba1);
        imageButton6.setImageResource(R.drawable.ba2);
        imageButton7.setImageResource(R.drawable.ba2);
        imageButton8.setImageResource(R.drawable.ba3);
        imageButton9.setImageResource(R.drawable.ba1);
        imageButton10.setImageResource(R.drawable.ba2);
    }

    public void pop(View v){
        AlertDialog.Builder alert_confirm = new AlertDialog.Builder(this);
        alert_confirm.setPositiveButton("확인", null);
        AlertDialog alert = alert_confirm.create();
        Random ram = new Random();
        int[]img ={R.drawable.img1,R.drawable.heart,R.drawable.cheese,R.drawable.ice,R.drawable.and,R.drawable.wifi,R.drawable.star};
        int num = ram.nextInt(img.length);

        ///alert.getWindow().setBackgroundDrawable(getResources().getDrawable(R.drawable.img1));
        alert.getWindow().setBackgroundDrawableResource(img[num]);
        alert.show();

    }
}
