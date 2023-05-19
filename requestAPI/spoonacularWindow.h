void runSpoonacular(GtkWidget *button, gpointer user_data) {

    GtkWidget *window = GTK_WIDGET(user_data);
    GtkWidget *form = gtk_bin_get_child(GTK_BIN(window));
    GtkWidget *queryEntry = gtk_grid_get_child_at(GTK_GRID(form), 1, 0);
    GtkWidget *cuisineEntry = gtk_grid_get_child_at(GTK_GRID(form), 1, 1);
    GtkWidget *dietEntry = gtk_grid_get_child_at(GTK_GRID(form), 1, 2);
    GtkWidget *intolerancesEntry = gtk_grid_get_child_at(GTK_GRID(form), 1, 3);
    GtkWidget *numberEntry = gtk_grid_get_child_at(GTK_GRID(form), 1, 4);

    const char *query = gtk_entry_get_text(GTK_ENTRY(queryEntry));
    const char *cuisine = gtk_entry_get_text(GTK_ENTRY(cuisineEntry));
    const char *diet = gtk_entry_get_text(GTK_ENTRY(dietEntry));
    const char *intolerances = gtk_entry_get_text(GTK_ENTRY(intolerancesEntry));
    const char *number = gtk_combo_box_text_get_active_text(GTK_COMBO_BOX_TEXT(numberEntry));

    // printf("Query: %s\n", query);
    // printf("Cuisine: %s\n", cuisine);
    // printf("Diet: %s\n", diet);
    // printf("Intolerances: %s\n", intolerances);
    //printf("Number: %s\n", number);


    char *url = (char *) malloc(1000 * sizeof(char));
    strcpy(url, "https://api.spoonacular.com/recipes/complexSearch?apiKey=9248a83a4d12462c93c718d70e654c3a");

    if (strcmp(query, "") != 0) {
        strcat(url, "&query=");
        strcat(url, query);
    }

    if (strcmp(cuisine, "") != 0) {
        strcat(url, "&cuisine=");
        strcat(url, cuisine);
    }

    if (strcmp(diet, "") != 0) {
        strcat(url, "&diet=");
        strcat(url, diet);
    }

    if (strcmp(intolerances, "") != 0) {
        strcat(url, "&intolerances=");
        strcat(url, intolerances);
    }

    if (strcmp(number, "") != 0) {
        strcat(url, "&number=");
        strcat(url, number);
    }

    // printf("%s\n", url);
    char filename[] = "output.txt";
    runApi(url, filename);
    
    formatToJson(filename, "spoonacularOutput.txt");

    // Ouvrir le fichier JSON formaté et l'afficher
    FILE *fp = fopen("spoonacularOutput.txt", "r");
    if (fp == NULL) {
        printf("Error opening file\n");
        return;
    }
    char c;
    while ((c = fgetc(fp)) != EOF) {
        printf("%c", c);
    }
    fclose(fp);

    remove("spoonacularOutput.txt");
    remove("output.txt");
    free(url);


}

void startSpoonacular(GtkWidget *button, gpointer user_data) {
    //Create new window
    GtkWidget *window = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    gtk_window_set_title(GTK_WINDOW(window), "Spoonacular");
    gtk_window_set_default_size(GTK_WINDOW(window), 500, 500);
    gtk_container_set_border_width(GTK_CONTAINER(window), 10);

    GtkWidget *form = gtk_grid_new();

    GtkWidget *queryLabel = gtk_label_new("Query");
    GtkWidget *queryEntry = gtk_entry_new();
    gtk_grid_attach(GTK_GRID(form), queryLabel, 0, 0, 1, 1);
    gtk_grid_attach(GTK_GRID(form), queryEntry, 1, 0, 1, 1);

    GtkWidget *cuisineLabel = gtk_label_new("Cuisine");
    GtkWidget *cuisineEntry = gtk_entry_new();
    gtk_grid_attach(GTK_GRID(form), cuisineLabel, 0, 1, 1, 1);
    gtk_grid_attach(GTK_GRID(form), cuisineEntry, 1, 1, 1, 1);
    
    GtkWidget *dietLabel = gtk_label_new("Diet");
    GtkWidget *dietEntry = gtk_entry_new();
    gtk_grid_attach(GTK_GRID(form), dietLabel, 0, 2, 1, 1);
    gtk_grid_attach(GTK_GRID(form), dietEntry, 1, 2, 1, 1);

    GtkWidget *intolerancesLabel = gtk_label_new("Intolerances");
    GtkWidget *intolerancesEntry = gtk_entry_new();
    gtk_grid_attach(GTK_GRID(form), intolerancesLabel, 0, 3, 1, 1);
    gtk_grid_attach(GTK_GRID(form), intolerancesEntry, 1, 3, 1, 1);


    /*Add number options to the combo box */ 
    GtkWidget *number = gtk_label_new("Number of recipes:");
    gtk_widget_set_halign(number, GTK_ALIGN_END);
    gtk_grid_attach(GTK_GRID(form), number, 0, 4, 1, 1);

    GtkWidget *numberComboBox = gtk_combo_box_text_new();
    
    for (gint i = 1; i <= 5; i++) {
        gchar *selected = g_strdup_printf("%d", i);
        gtk_combo_box_text_append_text(GTK_COMBO_BOX_TEXT(numberComboBox), selected);
        g_free(selected);
    }

    gtk_combo_box_set_active(GTK_COMBO_BOX(numberComboBox), 0);
    gtk_grid_attach(GTK_GRID(form), numberComboBox, 1, 4, 1, 1);


    GtkWidget *submitButton = gtk_button_new_with_label("Submit");
    g_signal_connect(submitButton, "clicked", G_CALLBACK(runSpoonacular), window);
    gtk_grid_attach(GTK_GRID(form), submitButton, 0, 5, 2, 1);


    // Center the form
    gtk_widget_set_halign(form, GTK_ALIGN_CENTER);
    gtk_widget_set_valign(form, GTK_ALIGN_CENTER);

    //Display window
    gtk_container_add(GTK_CONTAINER(window), form);
    gtk_widget_show_all(window);

}
