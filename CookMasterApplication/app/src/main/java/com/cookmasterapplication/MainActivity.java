package com.cookmasterapplication;

import android.os.Bundle;
import android.view.MenuItem;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.google.android.material.bottomnavigation.BottomNavigationView;

public class MainActivity extends AppCompatActivity implements BottomNavigationView.OnNavigationItemSelectedListener {

    BottomNavigationView bottomNavigationView;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

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
