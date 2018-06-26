using System;

// This program prompts the user to enter how many minutes they exercised.
// It gives them feedback on how they're doing based on the number of minutes entered.
// It then adds the user input to the running total of minutes.
// It continues to prompt the user until the user quits.
class Program
{
    static void Main()
    {
        var runningTotal = 0.0;

        // Repeat until the user quits
        while (true)
        {
            // Prompt the user for minutes exercised
            Console.Write("Enter how many minutes you exercised or type \"quit\" to exit: ");
            var entry = Console.ReadLine();

            if ("quit" == entry.ToLower())
            {
                break;
            }

            try
            {
                var minutes = double.Parse(entry);

                if (minutes <= 0)
                {
                    Console.WriteLine(minutes + " is not an acceptable value.");
                }
                else if (minutes <= 10)
                {
                    Console.WriteLine("Better than nothing, am I right?");
                }
                else if (minutes <= 30)
                {
                    Console.WriteLine("Way to go hot stuff!");
                }
                else if (minutes <= 60)
                {
                    Console.WriteLine("You must be a ninja warrior in training!");
                }
                else
                {
                    Console.WriteLine("Okay, now you're just showing off.");
                }

                runningTotal += minutes;
            }
            catch (FormatException)
            {
                Console.WriteLine("That is not valid input.");
                continue;
            }

            // Display total number of minutes exercised to screen
            Console.WriteLine("You've exercised for " + runningTotal + " minutes so far.");

        }

        Console.WriteLine("Goodbye");
    }
}
