package com.cookmasterapplication;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
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
        TextView time = view.findViewById(R.id.time);
        TextView author = view.findViewById(R.id.author);

        Recipes current = (Recipes)getItem(i);

        name.setText(current.getName());
        difficulty.setText(current.getDifficulty());
        time.setText(current.getTime());
        author.setText(current.getAuthor());

        return view;
    }
}
