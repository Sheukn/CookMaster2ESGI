package com.cookmasterapplication;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.MenuItem;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.material.bottomnavigation.BottomNavigationView;

import org.json.JSONArray;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity implements BottomNavigationView.OnNavigationItemSelectedListener {

    BottomNavigationView bottomNavigationView;


    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        SharedPreferences settings = getSharedPreferences("users", MODE_PRIVATE);

        RequestQueue queue = Volley.newRequestQueue(MainActivity.this);
        String url = "https://spatuledoree.fr/api/auth/getUserData";

        StringRequest stringRequest = new StringRequest(Request.Method.GET, url, response -> {
            try{
                JSONObject jsonObject = new JSONObject(response);
//                JSONObject jsonArray = jsonObject.getJSONObject("data");
                String name = String.valueOf(jsonObject.getJSONObject("data"));
                Toast.makeText(MainActivity.this, settings.getString(name, "") + name , Toast.LENGTH_SHORT).show();
                //

            }catch (Exception e){
                e.printStackTrace();
            }
        }, error -> {
            error.printStackTrace();
        }){
            @Override
            public Map<String, String> getHeaders() throws AuthFailureError {
                Map<String, String> headers = new HashMap<>();
                String accesstoken = settings.getString("token", "");
                headers.put("Authorization", "Bearer " + accesstoken);
                return headers;
            }
        };
        queue.add(stringRequest);

        bottomNavigationView = findViewById(R.id.bottomNavigationView);
        bottomNavigationView.setOnNavigationItemSelectedListener(this);
        bottomNavigationView.setSelectedItemId(R.id.profile);
    }

    CoursesActivity coursesActivity = new CoursesActivity();
    RecipesActivity recipesActivity = new RecipesActivity();
    ProfileActivity profileActivity = new ProfileActivity();

    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem item) {
        if (item.getItemId() == R.id.courses) {
            getSupportFragmentManager().beginTransaction().replace(R.id.flFragment, coursesActivity).commit();
            return true;
        }else if (item.getItemId() == R.id.recipes) {
            getSupportFragmentManager().beginTransaction().replace(R.id.flFragment, recipesActivity).commit();
            return true;
        }else if (item.getItemId() == R.id.profile) {
            getSupportFragmentManager().beginTransaction().replace(R.id.flFragment, profileActivity).commit();
            return true;
        }
        return false;
    }
}
