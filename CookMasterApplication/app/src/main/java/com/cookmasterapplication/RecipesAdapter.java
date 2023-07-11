package com.cookmasterapplication;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.List;

public class RecipesAdapter extends BaseAdapter{

    private List<Recipes> recipes;

    private Context context;

    public RecipesAdapter(List<Recipes> recipes, Context context) {
        this.recipes = recipes;
        this.context = context;
    }


    @Override
    public int getCount() {
        return this.recipes.size();
    }

    @Override
    public Object getItem(int i) {
        return this.recipes.get(i);
    }

    @Override
    public long getItemId(int i) {
        return this.recipes.get(i).getId();
    }

    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {
        if(view == null){
            LayoutInflater inflater = LayoutInflater.from(this.context);
            view = inflater.inflate(R.layout.recipies_rows, null);
        }

        TextView name = view.findViewById(R.id.name);
        TextView difficulty = view.findViewById(R.id.difficulty);
        TextView prep_time = view.findViewById(R.id.prepTime);
        TextView cooking_time = view.findViewById(R.id.cookTime);
        TextView origin = view.findViewById(R.id.origine);
        ImageView image = view.findViewById(R.id.image);

        Recipes current = (Recipes)getItem(i);

        name.setText(current.getName());
        difficulty.setText(current.getDifficulty());
        prep_time.setText("Temps de preparation\n" + current.getPrep_time() + " min");
        cooking_time.setText("Temps de cuisson\n" + current.getCooking_time() + " min");
        if (current.getImageId() == " ")
            image.setImageResource(R.drawable.spatule);
        else
            image.setImageResource(Integer.parseInt(current.getImageId()));
        origin.setText("Origine " +  current.getGastronomy());

        return view;
    }
}
