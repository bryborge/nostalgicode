<?php

    class RepeatCounter
    {

        function countRepeats($search_for, $in_string)
        {

            // Instantiate word counter
            $count = 0;

            // Control user input for capitalization
            $search_for = strtolower($search_for);
            $in_string = strtolower($in_string);

            // Control for punctuation
            $punctuation = array(".", ",", ";", ":", "'", "?", "!");
            $in_string = str_replace($punctuation, "", $in_string);

            // Slices string into an array of individual words
            $in_string_array = explode(" ", $in_string);

            // Search each word in string for a match; add 1 to $count for each match
            foreach($in_string_array as $word) {
                if ($word == $search_for) {
                    $count += 1;
                }
            }

            // Return int stored in count
            return $count;
        }

    }

?>
