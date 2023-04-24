#include <stdio.h>
#include <curl/curl.h>
#include <stdlib.h>
#include <string.h>
#include "runAPI.h"


int main(int argc, char *argv[]){


    printf("Entrez l'url de l'appel API: ");
    char *url = (char *) malloc(1000 * sizeof(char));
    scanf("%s", url);

    printf("Entrez votre clé API: ");
    char *apiKey = (char *) malloc(1000 * sizeof(char));
    scanf("%s", apiKey);

    strcat(url, "?apiKey=");
    strcat(url, apiKey);
    strcat(url, "&");

    printf("Entrez le nombre de paramètres de l'appel API: ");
    int nbParam = 0;
    scanf("%d", &nbParam);

    for (int i = 0; i < nbParam; i++)
    {
        printf("Entrez le nom du paramètre %d: ", i);
        char *paramName = (char *) malloc(1000 * sizeof(char));
        scanf("%s", paramName);

        printf("Entrez la valeur du paramètre %d: ", i);
        char *paramValue = (char *) malloc(1000 * sizeof(char));
        scanf("%s", paramValue);

        strcat(url, paramName);
        strcat(url, "=");
        strcat(url, paramValue);
        if (i != nbParam - 1)
            strcat(url, "&");
    }
    
    printf("%s\n", url);
    runApi(url);
}   