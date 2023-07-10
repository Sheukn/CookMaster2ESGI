package com.cookmasterapplication;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.ListView;
import android.widget.TextView;

import androidx.fragment.app.Fragment;

public class ProfileActivity extends Fragment {

    public ProfileActivity() {}
    private TextView id, coursStats, recetteStats;
    Button addNFC;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.activity_profile, container, false);

        id = view.findViewById(R.id.identifiant);
        coursStats = view.findViewById(R.id.courseStats);
        recetteStats = view.findViewById(R.id.recipeStats);

        SharedPreferences settings = getActivity().getSharedPreferences("users", Context.MODE_PRIVATE);
        String user = "Bonjour " + settings.getString("firstname", "null") + " " + settings.getString("name", "null") + " !";
        id.setText(user);

        addNFC = view.findViewById(R.id.addNfc);
        addNFC.setOnClickListener(new AdapterView.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(getActivity(), NfcActivity.class);
                startActivity(intent);
            }
        });


        return view;
    }
}
