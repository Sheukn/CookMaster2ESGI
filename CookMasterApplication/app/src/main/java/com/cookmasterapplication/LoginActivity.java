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
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

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

                }
                else {
                    RequestQueue queue = Volley.newRequestQueue(LoginActivity.this);
                        String url = "https://spatuledoree.fr/api/auth/login";
                    // Create body request
                    JSONObject jsonBody = new JSONObject();
                    String requestBody;
                    try {
                        jsonBody.put("email", identifiant.getText().toString());
                        jsonBody.put("password", password.getText().toString());
                        requestBody = jsonBody.toString();
                    } catch (JSONException e) {
                        throw new RuntimeException(e);
                    }
                    StringRequest stringRequest = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            try {
                                if (response.equals("false")) {
                                    Toast.makeText(LoginActivity.this, "Identifiant ou mot de passe incorrect", Toast.LENGTH_SHORT).show();
                                } else {
                                    JSONObject jsonObject = new JSONObject(response);
                                    edit.putString("token", jsonObject.getString("token"));
                                    edit.apply();
                                    // Toast.makeText(LoginActivity.this, jsonObject.getString("token"), Toast.LENGTH_SHORT).show();
                                    startActivity(intent);
                                    finish();
                                }
                            } catch (JSONException e) {
                                e.printStackTrace();
                            }
                        }
                    }, error -> {
                        Toast.makeText(LoginActivity.this, "Error", Toast.LENGTH_SHORT).show();
                    }) {
                        @Override
                        public String getBodyContentType() {
                            return "application/json; charset=utf-8";
                        }

                        @Override
                        public byte[] getBody() {
                            return requestBody.getBytes();
                        }
                    };
                    queue.add(stringRequest);


                }
            }
        });

    }
}