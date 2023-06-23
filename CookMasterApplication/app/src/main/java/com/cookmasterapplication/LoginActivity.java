package com.cookmasterapplication;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class LoginActivity extends AppCompatActivity {

    private Button submit;
    private EditText identifiant;
    private EditText password;

    private TextView forgot_password;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        this.submit = findViewById(R.id.submit);
        this.password = findViewById(R.id.password);
        this.identifiant = findViewById(R.id.identifiant);
        this.forgot_password = findViewById(R.id.forgot_password);

        SharedPreferences settings = getSharedPreferences("PREFS", Context.MODE_PRIVATE);
        SharedPreferences.Editor edit = settings.edit();

        this.submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(LoginActivity.this, MainActivity.class);
                if(identifiant.getText().toString().isEmpty() || password.getText().toString().isEmpty()) {

                    if (identifiant.getText().toString().isEmpty())
                        identifiant.setError("Veuillez entrer un identifiant");

                    if (password.getText().toString().isEmpty())
                        password.setError("Veuillez entrer un mot de passe");

                } else {
                    intent.putExtra("id", identifiant.getText().toString());
                    intent.putExtra("password", password.getText().toString());

                    edit.putString("id", identifiant.getText().toString());
                    edit.putString("password", password.getText().toString());
                    edit.apply();

                    startActivity(intent);

                    finish();
                }
            }
        });

    }
}