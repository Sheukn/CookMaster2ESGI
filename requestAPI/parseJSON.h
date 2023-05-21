void formatToJson(char* file, char* outputFile){

    // Ouvrir le fichier json
    FILE *jsonFile;
    jsonFile = fopen(file, "r");
    if (jsonFile == NULL) {
        printf("Error opening file\n");
        exit(1);
    }

    // Lire le fichier json et stocker son contenu 
    char * json = (char *) malloc(100000 * sizeof(char));
    char line[1000];
    while (fgets(line, sizeof(line), jsonFile)) {
        strcat(json, line);
    }

    fclose(jsonFile);

    int indent = 0;
    int len = strlen(json);
    int i = 0;
    int newLine = 1;
    char *parsed = (char *) malloc(100000 * sizeof(char));
    parsed[0] = '\0';
    while (i < len) {
        char ch = json[i];

        if (ch == '{' || ch == '[') {
            strncat(parsed, &ch, 1);
            strcat(parsed, "\n");
            indent++;
            newLine = 1;
            for (int j = 0; j < indent; j++) {
                strcat(parsed, "    ");
            }
        } else if (ch == '}' || ch == ']') {
            strcat(parsed, "\n");
            indent--;
            for (int j = 0; j < indent; j++) {
                strcat(parsed, "    ");
            }
            strncat(parsed, &ch, 1);
            newLine = 1;
        } else if (ch == ',') {
            strcat(parsed, "\n");
            newLine = 1;
            for (int j = 0; j < indent; j++) {
                strcat(parsed, "    ");
            }
        } else {
            if (newLine) {
                for (int j = 0; j < indent; j++) {
                    strcat(parsed, "    ");
                }
                newLine = 0;
            }
            strncat(parsed, &ch, 1);
        }

        i++;
    }
    strcat(parsed, "\n");
    
    // Ecrire le fichier json formaté
    
    FILE *fp;
    fp = fopen(outputFile, "w");
    fprintf(fp, "%s", parsed);
    fclose(fp);
    free(parsed);
    free(json);
}



