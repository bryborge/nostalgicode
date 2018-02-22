describe('pigLatin', function() {
    it ("adds 'ay' to the end of a single letter word that starts with a vowel", function() {
        expect(pigLatin("a")).to.equal("aay");
    });

    it ("adds 'ay' to the end of a multi-letter word that starts with a vowel", function() {
        expect(pigLatin("ant")).to.equal("antay");
    });

    it ("moves the first consonant from the beginning of a word to the end and adds 'ay'", function() {
        expect(pigLatin("hello")).to.equal("ellohay");
    });

    it ("moves all consecutive consonants from the beginning of a word to the end and adds 'ay'", function() {
        expect(pigLatin("check")).to.equal("eckchay");
    });

    it ("moves all consecutive consonants from the beginning of a word to the end and adds 'ay'", function() {
        expect(pigLatin("scribble")).to.equal("ibblescray");
    });

    it ("moves 'qu' from the beginning of a word to the end and adds 'ay'", function() {
        expect(pigLatin("quick")).to.equal("ickquay");
    });

    it ("moves a consonant and following 'qu' from the beginning of a word to the end of a word and adds 'ay'", function() {
        expect(pigLatin("squeak")).to.equal("eaksquay");
    });

    it ("converts multiple words in a string to pig latin, as described in all previous tests", function() {
        expect(pigLatin("hello world")).to.equal("ellohay orldway");
    });

});
