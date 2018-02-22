#include <stdio.h>
#include <stdlib.h>

/**
 * Functions
 */
void lay_bricks(int num_bricks);

/**
 * Build a pyramid inspired by Super Mario Bros.
 *
 * @param  argc Argument count.
 * @param  argv Argument provided by user.
 */
int main(int argc, char * argv[])
{
  char pyramid_height[10];

  // Get user input.
  printf("Height: ");
  fgets(pyramid_height, 10, stdin);

  // Convert the height of the pyramids to an integer.
  int height = strtol(pyramid_height, NULL, 10);

  // Iterate to the height of the pyramid.
  for (int n = 1; n <= height; n++) {
    // Calculate number of spaces before to print on this iteration.
    int spaces = height - n;

    // Assemble pyramids
    printf("%*s", spaces, "");
    lay_bricks(height - spaces);
    printf("  ");
    lay_bricks(height - spaces);
    printf("\n");
  }
}

/**
 * Lays the bricks ("#") for the pyramids.
 *
 * @param num_bricks The number of bricks to lay.
 */
void lay_bricks(int num_bricks)
{
  for (int i = 1; i <= num_bricks; i++) {
    printf("#");
  }
}
