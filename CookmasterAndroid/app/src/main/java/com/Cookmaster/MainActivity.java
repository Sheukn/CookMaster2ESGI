package com.Cookmaster;

import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {
    private Button connexion;
    private Button inscription;
    private Button quitter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        this.connexion = findViewById(R.id.connexion);
        this.inscription = findViewById(R.id.inscription);
        this.quitter = findViewById(R.id.quitter);

        this.connexion.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view) {
                // Opens Login Layout
                Intent intent = new Intent(MainActivity.this, Login.class);
                startActivity(intent);
            }
        });

        this.inscription.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // Opens subscription layout
                Intent intent = new Intent(MainActivity.this, SubscriptionSelect.class);
                startActivity(intent);
            }
        });

        this.quitter.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                new AlertDialog.Builder(MainActivity.this)
                        .setTitle("Quitter")
                        .setPositiveButton("Oui", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialogInterface, int i) {
                                finish();
                            }
                        })
                        .setNegativeButton("Non", new DialogInterface.OnClickListener() {
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
