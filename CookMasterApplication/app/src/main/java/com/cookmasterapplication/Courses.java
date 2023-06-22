package com.cookmasterapplication;

import android.os.Bundle;
import android.widget.EditText;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

public class Courses extends AppCompatActivity {

    private TextView identifiant;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_courses);

        this.identifiant = findViewById(R.id.identifiant);
        String id = getIntent().getStringExtra("id");
        // if id is empty then set it to "Guest"
        if (id.isEmpty()) {
            id = "Guest";
        }
        this.identifiant.setText("Bonjour " + id + " !");

    }
}
