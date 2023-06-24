void runSpoonacular(GtkWidget *button, gpointer user_data) {

    GtkWidget *window = GTK_WIDGET(user_data);
    GtkWidget *form = gtk_bin_get_child(GTK_BIN(window));
    GtkWidget *queryEntry = gtk_grid_get_child_at(GTK_GRID(form), 1, 0);
    GtkWidget *cuisineEntry = gtk_grid_get_child_at(GTK_GRID(form), 1, 1);
    GtkWidget *dietEntry = gtk_grid_get_child_at(GTK_GRID(form), 1, 2);
    GtkWidget *intolerancesEntry = gtk_grid_get_child_at(GTK_GRID(form), 1, 3);
    GtkWidget *numberEntry = gtk_grid_get_child_at(GTK_GRID(form), 1, 4);
    GtkWidget *scrolledView = gtk_grid_get_child_at(GTK_GRID(form), 1, 6);
    GtkWidget *textView = gtk_bin_get_child(GTK_BIN(scrolledView));
    
    const char *query = gtk_entry_get_text(GTK_ENTRY(queryEntry));
    const char *cuisine = gtk_entry_get_text(GTK_ENTRY(cuisineEntry));
    const char *diet = gtk_entry_get_text(GTK_ENTRY(dietEntry));
    const char *intolerances = gtk_entry_get_text(GTK_ENTRY(intolerancesEntry));
    const char *number = gtk_combo_box_text_get_active_text(GTK_COMBO_BOX_TEXT(numberEntry));

    // Load the file into the text view
    GtkTextBuffer *buffer = gtk_text_view_get_buffer(GTK_TEXT_VIEW(textView));
    gtk_text_buffer_set_text(buffer, "", -1);

    

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
    runApi(url, filename, buffer);
    
    formatToJson(filename, "outputJson.txt");


    
    FILE *fp;
    char line[1000];
    fp = fopen("outputJson.txt", "r");
    if (fp == NULL) {
        printf("Error opening file\n");
        exit(1);
    }
    while (fgets(line, sizeof(line), fp)) {
        if (g_utf8_validate(line, -1, NULL)) {
                gtk_text_buffer_insert_at_cursor(buffer, line, -1);
            }
        else {
            // add the char '{' to the line
            gtk_text_buffer_insert_at_cursor(buffer, "{\n", -1);
        }
    }
    fclose(fp);
    

    
    // Free memory and delete files
    remove("outputJson.txt");
    remove("output.txt");
    free(url);

}

void startSpoonacular(GtkWidget *button, gpointer user_data) {
    //Create new window
    GtkWidget *window = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    gtk_window_set_title(GTK_WINDOW(window), "Spoonacular");
    gtk_window_set_default_size(GTK_WINDOW(window), 1000, 700);
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

    // Create a text view
    GtkWidget *textView = gtk_text_view_new();
    gtk_text_view_set_editable(GTK_TEXT_VIEW(textView), FALSE);

    // Create a scrolled window to hold the text view
    GtkWidget *scrolledWindow = gtk_scrolled_window_new(NULL, NULL);
    gtk_container_add(GTK_CONTAINER(scrolledWindow), textView);
    gtk_scrolled_window_set_min_content_height(GTK_SCROLLED_WINDOW(scrolledWindow), 300);
    gtk_scrolled_window_set_min_content_width(GTK_SCROLLED_WINDOW(scrolledWindow), 800);
    gtk_grid_attach(GTK_GRID(form), scrolledWindow, 0, 6, 2, 1);
    
    //Display window
    gtk_container_add(GTK_CONTAINER(window), form);
    // Add the scrolled window to the window before the form
    gtk_widget_show_all(window);

}
