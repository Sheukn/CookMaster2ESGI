package com.cookmasterapplication;

import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONObject;

public class StartPageActivity extends AppCompatActivity {
    private Button connexion;
    private Button inscription;
    private Button quitter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_startpage);

        this.connexion = findViewById(R.id.connexion);
        this.inscription = findViewById(R.id.inscription);
        this.quitter = findViewById(R.id.quitter);
        this.connexion.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view) {
                // Opens Login Layout
                Intent intent = new Intent(StartPageActivity.this, LoginActivity.class);
                startActivity(intent);
            }
        });

        this.inscription.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // Opens subscription layout
                Intent intent = new Intent(StartPageActivity.this, SubscriptionSelectActivity.class);
                startActivity(intent);
            }
        });

        this.quitter.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                new AlertDialog.Builder(StartPageActivity.this)
                        .setTitle(getResources().getString(R.string.leavePopupTitle))
                        .setMessage(getResources().getString(R.string.leavePopupMessage))
                        .setPositiveButton(getResources().getString(R.string.leavePopupYes), new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialogInterface, int i) {
                                finish();
                            }
                        })
                        .setNegativeButton(getResources().getString(R.string.leavePopupNo), new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialogInterface, int i) {

                            }
                        })
                        .setCancelable(false)
                        .show();
            }
        });
    }


}
