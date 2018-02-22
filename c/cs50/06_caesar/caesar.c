#include <stdio.h>
#include <stdlib.h>

int main(int argc, char * argv[])
{
  // Return error message if missing argument.
  if (argc != 2)
  {
    printf("Usage: ./caesar k\n");
    return 1;
  }

  char plain[1000];

  // Get string from the user.
  printf("plaintext:  ");
  fgets(plain, 1000, stdin);

  // Convert argv[1] to integer.
  int shift = strtol(argv[1], NULL, 10);

  // char plain = get_string();
  printf("ciphertext: ");

  // Iterator
  int i = 0;

  // Iterate over the whole string ...
  while (plain[i] != '\0')
  {
    // if the current char is not A-Z or a-z, print that char ...
    if ((plain[i] >= 0 && plain[i] <= 64) || (plain[i] >= 91 && plain[i] <= 96))
    {
      printf("%c", plain[i]);
    }
    // else, if current char is A-Z or a-z, shift the letter by number entered
    // by user ...
    else if ((plain[i] + shift >= 65 && plain[i] + shift <= 90) || (plain[i] + shift >= 97 && plain[i] + shift <= 122))
    {
      printf("%c", plain[i] + shift);
    }
    // otherwise, if adding shift to current char would make it no A-Z or a-z,
    // loop it back around ...
    else
    {
      printf("%c", plain[i] + shift - 26);
    }

    i++;
  }

  printf("\n");

  return 0;
}
