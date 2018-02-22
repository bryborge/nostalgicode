describe("coinCombo", function() {
    it("will return [0, 0, 0, 1] for an input of .01", function() {
        expect(coinCombo(.01)).to.eql([0, 0, 0, 1]);
    });

    it("will return [0, 0, 0, 2] for an input of .02", function() {
        expect(coinCombo(.02)).to.eql([0, 0, 0, 2]);
    });

    it("will return [0, 0, 1, 0] for an input of .05", function() {
        expect(coinCombo(.05)).to.eql([0, 0, 1, 0]);
    });

    it("will return [0, 1, 0, 0] for an input of .1", function() {
        expect(coinCombo(.1)).to.eql([0, 1, 0, 0]);
    });

    it("will return [1, 0, 0, 0] for an input of .25", function() {
        expect(coinCombo(.25)).to.eql([1, 0, 0, 0]);
    });

    it("will return [0, 0, 1, 1] for an input of .06", function() {
        expect(coinCombo(.06)).to.eql([0, 0, 1, 1]);
    });

    it("will return [1, 1, 1, 1] for an input of .41", function() {
        expect(coinCombo(.41)).to.eql([1, 1, 1, 1]);
    });

    it("will return [3, 1, 0, 1] for an input of .86", function() {
        expect(coinCombo(.86)).to.eql([3, 1, 0, 1]);
    });

});
