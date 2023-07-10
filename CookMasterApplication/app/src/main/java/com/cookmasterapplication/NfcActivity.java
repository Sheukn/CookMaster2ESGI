package com.cookmasterapplication;

import android.app.Activity;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.content.IntentFilter;
import android.content.SharedPreferences;
import android.nfc.FormatException;
import android.nfc.NdefMessage;
import android.nfc.NdefRecord;
import android.nfc.NfcAdapter;
import android.nfc.Tag;
import android.nfc.tech.Ndef;
import android.os.Bundle;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

public class NfcActivity extends AppCompatActivity {
    private NfcAdapter nfcAdapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_nfc);

        // Obtenez une instance de NfcAdapter
        nfcAdapter = NfcAdapter.getDefaultAdapter(this);
    }

    @Override
    protected void onResume() {
        super.onResume();
        Intent intent = new Intent(this, MainActivity.class).addFlags(Intent.FLAG_RECEIVER_REPLACE_PENDING);
        PendingIntent pendingIntent = PendingIntent.getActivity(this, 0, intent, PendingIntent.FLAG_MUTABLE);
        IntentFilter[] intentFilters = new IntentFilter[]{};

        nfcAdapter.enableForegroundDispatch(this, pendingIntent, intentFilters, null);
    }

    @Override
    protected void onPause() {
        super.onPause();
        nfcAdapter.disableForegroundDispatch(this);
    }


    @Override
    protected void onNewIntent(Intent intent) {
        super.onNewIntent(intent);
        if (intent.hasExtra(NfcAdapter.EXTRA_TAG)) {
            Tag tag = intent.getParcelableExtra(NfcAdapter.EXTRA_TAG);
            writeNdefMessage(tag);
        }
    }

    private void writeNdefMessage(Tag tag) {
        SharedPreferences settings = getSharedPreferences("users", Context.MODE_PRIVATE);
        String name = settings.getString("name", "");
        String firstName = settings.getString("firstName", "");
        NdefRecord nameRecord = createTextRecord("Name: " + name);
        NdefRecord firstNameRecord = createTextRecord("First Name: " + firstName);

        NdefMessage ndefMessage = new NdefMessage(new NdefRecord[]{nameRecord, firstNameRecord});

        // Obtenez une instance de Ndef pour le tag
        Ndef ndef = Ndef.get(tag);
        if (ndef != null) {
            try {
                // Connectez-vous au tag et écrivez le message NDEF
                ndef.connect();
                ndef.writeNdefMessage(ndefMessage);
                Toast.makeText(this, "Écriture réussie", Toast.LENGTH_SHORT).show();
            } catch (IOException | NullPointerException | FormatException e) {
                e.printStackTrace();
                Toast.makeText(this, "Erreur lors de l'écriture", Toast.LENGTH_SHORT).show();
            } finally {
                try {
                    ndef.close();
                } catch (IOException e) {
                    e.printStackTrace();
                }
            }
        } else {
            Toast.makeText(this, "Le tag n'est pas compatible NDEF", Toast.LENGTH_SHORT).show();
        }
    }

    private NdefRecord createTextRecord(String text) {
        byte[] languageBytes = "en".getBytes();
        byte[] textBytes = text.getBytes();
        int languageLength = languageBytes.length;
        int textLength = textBytes.length;

        byte[] payload = new byte[1 + languageLength + textLength];
        payload[0] = (byte) languageLength;
        System.arraycopy(languageBytes, 0, payload, 1, languageLength);
        System.arraycopy(textBytes, 0, payload, 1 + languageLength, textLength);

        return new NdefRecord(NdefRecord.TNF_WELL_KNOWN, NdefRecord.RTD_TEXT, new byte[0], payload);
    }
}
