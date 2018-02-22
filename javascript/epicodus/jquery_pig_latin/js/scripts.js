function pigLatin(words) {

    // VOWEL, CONSONANT, AND SPECIAL CASE LIST
    var vowels = "aeiou";
    var consonants = "bcdfghjklmnpqrstvwxyz";
    var special = "qu";

    // CONVERT USER INPUT TO ARRAY AND DECLARE A NEW ARRAY TO COLLECT AND RETURN
    var wordsArray = words.split(" ");
    var newArray = [];
    var word;

    // For each word in the wordsArray...
    for (word = 0; word < wordsArray.length; word++) {
        // If the word starts with a vowel, add "ay" to the end of the word and put the word into newArray
        if (vowels.indexOf(wordsArray[word].charAt(0)) !== -1) {
            newArray.push(wordsArray[word] + "ay");
        }
        // If the words starts with "qu", put "qu" at the end of word, add "ay" to the end and put word into newArray
        else if (special === wordsArray[word].slice(0,2)) {
            newArray.push(wordsArray[word].substring(2) + wordsArray[word].charAt(0) + wordsArray[word].charAt(1) + "ay");
        }
        // If the word has "qu" directly behind first letter, do same as above, only add the consonant to the end as well
        else if (special === wordsArray[word].slice(1,3)) {
            newArray.push(wordsArray[word].substring(3) + wordsArray[word].charAt(0) + wordsArray[word].charAt(1) + wordsArray[word].charAt(2) + "ay");
        }
        // Put all consecutive consonants from the beginning of word at the end of the word, tack on "ay" and put word into newArray
        else if (consonants.indexOf(wordsArray[word].charAt(0)) !== -1) {
            do {
                wordsArray[word] = wordsArray[word].substring(1) + wordsArray[word].charAt(0);
            }
            while (vowels.indexOf(wordsArray[word].charAt(0)) === -1);
                newArray.push(wordsArray[word] + "ay");
        }
    }

    return newArray.join(" ");

};


$(document).ready(function() {
    $('form#pig-latin').submit(function(event) {
        var words = $('input#words').val();
        var result = pigLatin(words);

        alert(result);

        event.preventDefault();
    });
});

// NOT WORKING - TRYING TO LOOP THROUGH ARRAY TO CONVERT ALL WORDS TO PIG LATIN

// var wordsArray = words.split(" ");
// var newWordsArray = [];
//
// for (word = 0; word < wordsArray.length; word++) {
//     if (vowels.indexOf(word.charAt(0)) !== -1) {
//         word = word + "ay";
//         wordsArray.push(word);
//     } else if (special === word.slice(0,2)) {
//         word = word.substring(2) + word.charAt(0) + word.charAt(1) + "ay";
//         wordsArray.push(word);
//     } else if (special === word.slice(1,3)) {
//         word = word.substring(3) + word.charAt(0) + word.charAt(1) + word.charAt(2) + "ay";
//         wordsArray.push(word);
//     } else if (consonants.indexOf(word.charAt(0)) !== -1) {
//         do {
//             word = word.substring(1) + word.charAt(0);
//         } while (vowels.indexOf(word.charAt(0)) === -1);
//         word = word + "ay";
//         wordsArray.push(word);
//     }
// }
//
// return wordsArray.join(" ");
//
// };


// WORKING BUT BULKY, REDUNDANT, AND INFLEXIBLE CODE

// var pigLatin = function(word) {
// var ay = "ay";
//
// var firstLetter = word.charAt(0);
// var secondLetter = word.charAt(1);
// var thirdLetter = word.charAt(2);
//
// if (firstLetter + secondLetter === "qu") {
//     word = word.substring(2);
//     word = word + firstLetter + secondLetter;
// } else if (secondLetter + thirdLetter === "qu") {
//     word = word.substring(3);
//     word = word + firstLetter + secondLetter + thirdLetter;
// } else {
//     if (firstLetter !== "a" && firstLetter !== "e" && firstLetter !== "i" && firstLetter !== "o" && firstLetter !== "u") {
//         word = word.substring(1);
//         word = word + firstLetter;
//         if (secondLetter !== "a" && secondLetter !== "e" && secondLetter !== "i" && secondLetter !== "o" && secondLetter !== "u") {
//             word = word.substring(1);
//             word = word + secondLetter;
//             if (thirdLetter !== "a" && thirdLetter !== "e" && thirdLetter !== "i" && thirdLetter !== "o" && thirdLetter !== "u") {
//                 word = word.substring(1);
//                 word = word + thirdLetter;
//             }
//         }
//     }
// }
//
// word = word + ay;
//
// return word;
// };
