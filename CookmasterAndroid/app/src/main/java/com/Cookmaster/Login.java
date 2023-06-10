package com.Cookmaster;

import androidx.appcompat.app.AppCompatActivity;

import android.app.AlertDialog;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class Login extends AppCompatActivity {

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

        this.submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Login.this, Courses.class);
                if(identifiant.getText().toString().isEmpty() || password.getText().toString().isEmpty()) {

                    if (identifiant.getText().toString().isEmpty())
                        identifiant.setError("Veuillez entrer un identifiant");

                    if (password.getText().toString().isEmpty())
                        password.setError("Veuillez entrer un mot de passe");

                } else {
                    intent.putExtra("id", identifiant.getText().toString());
                    intent.putExtra("password", password.getText().toString());
                    startActivity(intent);
                }
            }
        });

    }
}