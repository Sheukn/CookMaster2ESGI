package com.cookmasterapplication;

import androidx.appcompat.app.AppCompatActivity;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class RecipeViewActivity extends AppCompatActivity {

    TextView name, description, ingredients;
    ImageView image;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_recipe_view);

        this.name = findViewById(R.id.name);
        this.description = findViewById(R.id.description);
        this.ingredients = findViewById(R.id.ingredients);
        this.image = findViewById(R.id.image);

        Bundle extras = getIntent().getExtras();
        long id = extras.getLong("id");

        String url = "https://spatuledoree.fr/api/recipe/" + id;
        RequestQueue queue = Volley.newRequestQueue(this);
        StringRequest stringRequest = new StringRequest(Request.Method.GET, url, response -> {
            try{
                JSONObject jsonObject = new JSONObject(response);
                JSONObject data = jsonObject.getJSONObject("data");
                name.setText(data.getString("name"));
                description.setText(data.getString("description"));
                JSONArray ingredientsList = data.getJSONArray("ingredients");
                StringBuilder ingredientsString = new StringBuilder();
                ingredientsString.append("Ingrédients : \n");
                for (int i = 0; i < ingredientsList.length(); i++) {
                    JSONObject ingredient = ingredientsList.getJSONObject(i);
                    ingredientsString.append(ingredient.getString("name")).append(" : ");
                    JSONObject pivot = ingredient.getJSONObject("pivot");
                    ingredientsString.append(pivot.getString("quantity")).append("\n");
                }

                ingredients.setText(ingredientsString.toString());

                image.setImageResource(R.drawable.spatule);

            } catch (Exception e){
                e.printStackTrace();
            }
        }, Throwable::printStackTrace){
            @Override
            public Map<String, String> getHeaders() throws AuthFailureError {
                SharedPreferences settings = getSharedPreferences("users", MODE_PRIVATE);
                Map<String, String> headers = new HashMap<>();
                String Token = settings.getString("token", "");
                headers.put("Authorization", "Bearer " + Token);
                return headers;
            }
        };
        queue.add(stringRequest);


}}



