#include <ctype.h>
#include <stdio.h>
#include <stdlib.h>

/**
 * Print the initials of a given string.
 *
 * @param  argc Argument count.
 * @param  argv Argument provided by user.
 */
int main(int argc, char * argv[])
{
  char s[1000];

  // Get string from the user.
  printf("String: ");
  fgets(s, 1000, stdin);

  // Make sure string s has a value.
  if (s != NULL) {
    int n = 0;

    // While the current character is not the string terminator ...
    while (s[n] != '\0') {
      // If the current character is not whitespace AND
      // it's the first character OR
      // a character directly following a whitespace ...
      if (s[n] != 32 && (n == 0 || s[n - 1] == 32)) {
        // Uppercase the letter and print it
        printf("%c", toupper(s[n]));
      }

      n++;
    }

    printf("\n");
  }
}
