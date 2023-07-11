package com.cookmasterapplication;

import android.content.Context;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

import androidx.fragment.app.Fragment;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class RecipesActivity extends Fragment {

    public RecipesActivity() {}


    List<Recipes> recipes = new ArrayList<>();
    private ListView listView;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.activity_recipes, container, false);

        SharedPreferences settings = getActivity().getSharedPreferences("users", Context.MODE_PRIVATE);
        RequestQueue queue = Volley.newRequestQueue(this.getContext());
        String url = "https://spatuledoree.fr/api/recipes";
        StringRequest stringRequest = new StringRequest(Request.Method.GET, url, response -> {
            try{
                JSONObject jsonObject = new JSONObject(response);
                JSONArray  jsonArray = jsonObject.getJSONArray("data");

                for (int i = 0; i < jsonArray.length(); i++) {

                    JSONObject json = jsonArray.getJSONObject(i);
                    String name = json.getString("name");
                    String category = json.getString("category");
                    String description = json.getString("description");
                    long id = json.getInt("id");
                    int prepTime = json.getInt("prep_time");
                    int cookTime = json.getInt("cooking_time");
                    int numberOfPersons = json.getInt("number_of_persons");
                    String type = json.getString("type");
                    String gastronomy = json.getString("gastronomy");
                    String difficulty = json.getString("difficulty");
                    Boolean isBookmarked = false;
                    String imageId = " ";

                    Recipes recipe = new Recipes(id, category, name, description, prepTime, cookTime, numberOfPersons, type, gastronomy, difficulty, isBookmarked, imageId);
                    recipes.add(recipe);
                }

                getActivity().runOnUiThread(() -> {
                    RecipesAdapter adapter = new RecipesAdapter(recipes, RecipesActivity.this.getContext());
                    listView.setAdapter(adapter);
                });

            }catch (Exception e){
                e.printStackTrace();
            }
        }, Throwable::printStackTrace){
            @Override
            public Map<String, String> getHeaders() throws AuthFailureError {
                Map<String, String> headers = new HashMap<>();
                String accesstoken = settings.getString("token", "");
                headers.put("Authorization", "Bearer " + accesstoken);
                return headers;
            }
        };
        queue.add(stringRequest);




        // Update the view with the recipes
        this.listView = view.findViewById(R.id.lw);
        RecipesAdapter adapter = new RecipesAdapter(recipes, this.getContext());
        this.listView.setAdapter(adapter);

        this.listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                Recipes r = (Recipes)adapterView.getItemAtPosition(i);
                Toast.makeText(RecipesActivity.this.getContext(), r.getName(), Toast.LENGTH_SHORT).show();
            }
        });

        return view;

    }
}

