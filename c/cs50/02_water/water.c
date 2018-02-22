#include <stdio.h>
#include <stdlib.h>

/**
 * Converts shower water usage in "bottles of water" per minute.
 *
 * @param  argc Argument count.
 * @param  argv Argument provided by user.
 */
int main(int argc, char * argv[])
{
  char minutes[10];

  // Get user input.
  printf("Minutes: ");
  fgets(minutes, 10, stdin);

  // Convert user input into integer.
  int time_in_shower = strtol(minutes, NULL, 10);

  // Calculate number of water bottles used.
  int bottles = time_in_shower * 12;

  printf("Bottles: %i\n", bottles);
}
