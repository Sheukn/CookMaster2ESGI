package com.cookmasterapplication;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

import androidx.fragment.app.Fragment;

import java.util.ArrayList;
import java.util.List;

public class RecipesActivity extends Fragment {

    public RecipesActivity() {}

    private List<Recipes> getRecipes(){
        List<Recipes> recipes = new ArrayList<>();
        recipes.add(new Recipes("Poulet au curry", "Facile", "30 min", "Jean"));
        recipes.add(new Recipes("Patates au four", "Facile", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au beurre", "Facile", "30 min", "Jean"));
        recipes.add(new Recipes("Riz blanc", "Facile", "30 min", "Jean"));
        recipes.add(new Recipes("Pates Carbonara", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates Bolognaise", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au pesto", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au saumon", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au thon", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au poulet", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au boeuf", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au canard", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au porc", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au veau", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au cheval", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au mouton", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au lapin", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au kangourou", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au requin", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au thon", "Moyen", "30 min", "Jean"));
        recipes.add(new Recipes("Pates au thon", "Moyen", "30 min", "Jean"));
        return recipes;
    }

    private ListView listView;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.activity_recipes, container, false);

        // Update the view with the recipes
        this.listView = view.findViewById(R.id.lw);

        RecipesAdapter adapter = new RecipesAdapter(this.getRecipes(), this.getContext());
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

