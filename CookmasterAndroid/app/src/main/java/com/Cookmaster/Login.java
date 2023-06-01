package com.Cookmaster;

import androidx.appcompat.app.AppCompatActivity;

import android.app.AlertDialog;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

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
                new AlertDialog.Builder(Login.this)
                        .setTitle("test")
                        .setMessage(identifiant.getText() + "\n" + password.getText())
                        .show();
            }
        });

        this.forgot_password.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // Do something
            }
        });

    }
}