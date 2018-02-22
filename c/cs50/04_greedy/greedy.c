#include <stdio.h>
#include <stdlib.h>

/**
 * Calculates the minimum number of coins required to give a change.
 *
 * @param  argc Argument count.
 * @param  argv Argument provided by user.
 */
int main(int argc, char * argv[])
{
  char change_owed[5];

  // Get user input.
  printf("Hi! How much change is owed?\n");
  fgets(change_owed, 5, stdin);

  // Convert user input to float.
  float change = atof(change_owed);

  int cents = change * 100;
  int coins_due = 0;

  while (cents > 0) {
    // Quarter
    if (cents >= 25) {
      coins_due += 1;
      cents -=25;
    // Dime
    } else if (cents >= 10) {
      coins_due += 1;
      cents -= 10;
    // Nickel
    } else if (cents >= 5) {
      coins_due += 1;
      cents -= 5;
    // Penny
    } else if (cents >= 1) {
      coins_due += 1;
      cents -= 1;
    }
  }

  printf("%i\n", coins_due);
}
