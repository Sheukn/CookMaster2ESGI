#include <stdio.h>
#include <curl/curl.h>
#include <stdlib.h>
#include <string.h>
#include "runSpoonacular.h"


int main(int argc, char *argv[]) {

    char *url = (char *) malloc(1000 * sizeof(char));
    strcpy(url, "https://api.spoonacular.com/recipes/complexSearch?apiKey=9248a83a4d12462c93c718d70e654c3a");

    for (int i = 2; i < argc; i++){
        switch (i)
        {
        case 2:
            strcat(url, "&query=");
            strcat(url, argv[i]);
            break;
        
        case 3:
            strcat(url, "&cuisine=");
            strcat(url, argv[i]);
            break;

        case 4:
            strcat(url, "&diet=");
            strcat(url, argv[i]);
            break;

        case 5:
            strcat(url, "&intolerances=");
            strcat(url, argv[i]);
            break;
        default:
            break;
        }
    }

    strcat(url, "&number=" );
    strcat(url, argv[1]);


    //printf("%s\n", url);
    runApi(url);

    free(url);
}
