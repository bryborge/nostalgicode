describe("romanNumeral", function() {
    it("should return 'I' for an input value of 1", function() {
        expect(romanNumeral(1)).to.equal('I');
    });

    it("should return 'II' for an input value of 2", function() {
        expect(romanNumeral(2)).to.equal('II');
    });

    it("should return 'III' for an input value of 3", function() {
        expect(romanNumeral(3)).to.equal('III');
    });

    it("should return 'IV' for an input value of 4", function() {
        expect(romanNumeral(4)).to.equal('IV');
    });

    it("should return 'V' for an input value of 5", function() {
        expect(romanNumeral(5)).to.equal('V');
    });

    it("should return 'VI' for an input value of 6", function() {
        expect(romanNumeral(6)).to.equal('VI');
    });

    it("should return 'VII' for an input value of 7", function() {
        expect(romanNumeral(7)).to.equal('VII');
    });

    it("should return 'IX' for an input value of 9", function() {
        expect(romanNumeral(9)).to.equal('IX');
    });

    it("should return 'X' for an input value of 10", function() {
        expect(romanNumeral(10)).to.equal('X');
    });

    it("should return 'XI' for an input value of 11", function() {
        expect(romanNumeral(11)).to.equal('XI');
    });

    it("should return 'XXI' for an input value of 21", function() {
        expect(romanNumeral(21)).to.equal('XXI');
    });

    it("should return 'XXVIII' for an input value of 28", function() {
        expect(romanNumeral(28)).to.equal('XXVIII');
    });

    it("should return 'XL' for an input value of 40", function() {
        expect(romanNumeral(40)).to.equal('XL');
    });

    it("should return 'L' for an input value of 50", function() {
        expect(romanNumeral(50)).to.equal('L');
    });

    it("should return 'LIV' for an input value of 54", function() {
        expect(romanNumeral(54)).to.equal('LIV');
    });

    it("should return 'XC' for an input value of 90", function() {
        expect(romanNumeral(90)).to.equal('XC');
    });

    it("should return 'C' for an input value of 100", function() {
        expect(romanNumeral(100)).to.equal('C');
    });

    it("should return 'CD' for an input value of 400", function() {
        expect(romanNumeral(400)).to.equal('CD');
    });

    it("should return 'D' for an input value of 500", function() {
        expect(romanNumeral(500)).to.equal('D');
    });

    it("should return 'CM' for an input value of 900", function() {
        expect(romanNumeral(900)).to.equal('CM');
    });

    it("should return 'M' for an input value of 1000", function() {
        expect(romanNumeral(1000)).to.equal('M');
    });

    it("should return 'MMMCMXCIX' for an input value of 3999", function() {
        expect(romanNumeral(3999)).to.equal('MMMCMXCIX');
    });
});
