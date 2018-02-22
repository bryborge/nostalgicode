PeriodicTable.controller("TableCtrl", function TableCtrl($scope) {

  // PERIODIC BUILD LIST
  $scope.elements_rows = [
      { "row" :
        [
          { class: "element", number: 1, name: "Hydrogen", symbol: "H", type: "non-metals", weight: 1.00794, electrons: "1s1" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "element", number: 2, name: "Helium", symbol: "He", type: "noble-gases", weight: 4.002602, electrons: "1s2" },
        ]
      },

      { "row" :
        [
          { class: "element", number: 3, name: "Lithium", symbol: "Li", type: "alkali-metals", weight: 6.941, electrons: "[He] 2s1" },
          { class: "element", number: 4, name: "Beryllium", symbol: "Be", type: "alkali-earth-metals", weight: 9.012182, electrons: "[He] 2s2" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "element", number: 5, name: "Boron", symbol: "B", type: "non-metals", weight: 10.811, electrons: "[He] 2s2 2p1" },
          { class: "element", number: 6, name: "Carbon", symbol: "C", type: "non-metals", weight: 12.0107, electrons: "[He] 2s2 2p2" },
          { class: "element", number: 7, name: "Nitrogen", symbol: "N", type: "non-metals", weight: 14.0067, electrons: "[He] 2s2 2p3" },
          { class: "element", number: 8, name: "Oxygen", symbol: "O", type: "non-metals", weight: 15.9994, electrons: "[He] 2s2 2p4" },
          { class: "element", number: 9, name: "Flourine", symbol: "F", type: "halogens", weight: 18.998404, electrons: "[He] 2s2 2p5" },
          { class: "element", number: 10, name: "Neon", symbol: "Ne", type: "noble-gases", weight: 20.1797, electrons: "[He] 2s2 2p6" },
        ]
      },

      { "row" :
        [
          { class: "element", number: 11, name: "Sodium", symbol: "Na", type: "alkali-metals", weight: 22.989769, electrons: "[Ne] 3s1" },
          { class: "element", number: 12, name: "Magnesium", symbol: "Mg", type: "alkali-earth-metals", weight: 24.305, electrons: "[Ne] 3s2" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "element", number: 13, name: "Aluminium", symbol: "Al", type: "other-metals", weight: 26.981539, electrons: "[Ne] 3s2 3p1" },
          { class: "element", number: 14, name: "Silicon", symbol: "Si", type: "non-metals", weight: 28.0855, electrons: "[Ne] 3s2 3p2" },
          { class: "element", number: 15, name: "Phosphorus", symbol: "P", type: "non-metals", weight: 30.973763, electrons: "[Ne] 3s2 3p3" },
          { class: "element", number: 16, name: "Sulfur", symbol: "S", type: "non-metals", weight: 32.065, electrons: "[Ne] 3s2 3p4" },
          { class: "element", number: 17, name: "Chlorine", symbol: "Cl", type: "halogens", weight: 35.453, electrons: "[Ne] 3s2 3p5" },
          { class: "element", number: 18, name: "Argon", symbol: "Ar", type: "noble-gases", weight: 39.948, electrons: "[Ne] 3s2 3p6" },
        ]
      },

      { "row" :
        [
          { class: "element", number: 19, name: "Potassium", symbol: "K", type: "alkali-metals", weight: 39.0983, electrons: "[Ar] 4s1" },
          { class: "element", number: 20, name: "Calcium", symbol: "Ca", type: "alkali-earth-metals", weight: 40.078, electrons: "[Ar] 4s2" },
          { class: "element", number: 21, name: "Scandium", symbol: "Sc", type: "transition-metals", weight: 44.955914, electrons: "[Ar] 3d1 4s2" },
          { class: "element", number: 22, name: "Titanium", symbol: "Ti", type: "transition-metals", weight: 47.867, electrons: "[Ar] 3d2 4s2" },
          { class: "element", number: 23, name: "Vanadium", symbol: "V", type: "transition-metals", weight: 50.9415, electrons: "[Ar] 3d3 4s2" },
          { class: "element", number: 24, name: "Chromium", symbol: "Cr", type: "transition-metals", weight: 51.9961, electrons: "[Ar] 3d5 4s1" },
          { class: "element", number: 25, name: "Manganese", symbol: "Mn", type: "transition-metals", weight: 54.938046, electrons: "[Ar] 3d5 4s2" },
          { class: "element", number: 26, name: "Iron", symbol: "Fe", type: "transition-metals", weight: 55.845, electrons: "[Ar] 3d6 4s2" },
          { class: "element", number: 27, name: "Colbalt", symbol: "Co", type: "transition-metals", weight: 58.933193, electrons: "[Ar] 3d7 4s2" },
          { class: "element", number: 28, name: "Nickel", symbol: "Ni", type: "transition-metals", weight: 58.6934, electrons: "[Ar] 3d8 4s2" },
          { class: "element", number: 29, name: "Copper", symbol: "Cu", type: "transition-metals", weight: 63.546, electrons: "[Ar] 3d10 4s1" },
          { class: "element", number: 30, name: "Zinc", symbol: "Zn", type: "transition-metals", weight: 65.38, electrons: "[Ar] 3d10 4s2" },
          { class: "element", number: 31, name: "Gallium", symbol: "Ga", type: "other-metals", weight: 69.723, electrons: "[Ar] 3d10 4s2 4p1" },
          { class: "element", number: 32, name: "Germanium", symbol: "Ge", type: "other-metals", weight: 72.63, electrons: "[Ar] 3d10 4s2 4p2" },
          { class: "element", number: 33, name: "Arsenic", symbol: "As", type: "non-metals", weight: 74.9216, electrons: "[Ar] 3d10 4s2 4p3" },
          { class: "element", number: 34, name: "Selenium", symbol: "Se", type: "non-metals", weight: 78.96, electrons: "[Ar] 3d10 4s2 4p4" },
          { class: "element", number: 35, name: "Bromine", symbol: "Br", type: "halogens", weight: 79.904, electrons: "[Ar] 3d10 4s2 4p5" },
          { class: "element", number: 36, name: "Krypton", symbol: "Kr", type: "noble-gases", weight: 83.798, electrons: "[Ar] 3d10 4s2 4p6" },
        ]
      },

      { "row" :
        [
          { class: "element", number: 37, name: "Rubidium", symbol: "Rb", type: "alkali-metals", weight: 85.4678, electrons: "[Kr] 5s1" },
          { class: "element", number: 38, name: "Strontium", symbol: "Sr", type: "alkali-earth-metals", weight: 87.62, electrons: "[Kr] 5s2" },
          { class: "element", number: 39, name: "Yttrium", symbol: "Y", type: "transition-metals", weight: 88.90585, electrons: "[Kr] 4d1 5s2" },
          { class: "element", number: 40, name: "Zirconium", symbol: "Zr", type: "transition-metals", weight: 91.224, electrons: "[Kr] 4d2 5s2" },
          { class: "element", number: 41, name: "Niobium", symbol: "Nb", type: "transition-metals", weight: 92.90638, electrons: "[Kr] 4d4 5s1" },
          { class: "element", number: 42, name: "Molybdenum", symbol: "Mo", type: "transition-metals", weight: 95.96, electrons: "[Kr] 4d5 5s1" },
          { class: "element", number: 43, name: "Technetium", symbol: "Tc", type: "transition-metals", weight: 98, electrons: "[Kr] 4d7 5s1" },
          { class: "element", number: 44, name: "Ruthenium", symbol: "Ru", type: "transition-metals", weight: 101.07, electrons: "[Kr] 4d8 5s1" },
          { class: "element", number: 45, name: "Rhodium", symbol: "Rh", type: "transition-metals", weight: 102.9055, electrons: "[Kr] 4d8 5s2" },
          { class: "element", number: 46, name: "Palladium", symbol: "Pd", type: "transition-metals", weight: 106.42, electrons: "[Kr] 4d10" },
          { class: "element", number: 47, name: "Silver", symbol: "Ag", type: "transition-metals", weight: 107.8682, electrons: "[Kr] 4d10 5s1" },
          { class: "element", number: 48, name: "Cadmium", symbol: "Cd", type: "transition-metals", weight: 112.411, electrons: "[Kr] 4d10 5s2" },
          { class: "element", number: 49, name: "Indium", symbol: "In", type: "other-metals", weight: 114.818, electrons: "[Kr] 4d10 5s2 5p1" },
          { class: "element", number: 50, name: "Tin", symbol: "Sn", type: "other-metals", weight: 118.71, electrons: "[Kr] 4d10 5s2 5p2" },
          { class: "element", number: 51, name: "Antimony", symbol: "Sb", type: "other-metals", weight: 121.76, electrons: "[Kr] 4d10 5s2 5p3" },
          { class: "element", number: 52, name: "Tellurium", symbol: "Te", type: "non-metals", weight: 127.6, electrons: "[Kr] 4d10 5s2 5p4" },
          { class: "element", number: 53, name: "Iodine", symbol: "I", type: "halogens", weight: 126.90447, electrons: "[Kr] 4d10 5s2 5p5" },
          { class: "element", number: 54, name: "Xenon", symbol: "Xe", type: "noble-gases", weight: 131.293, electrons: "[Kr] 4d10 5s2 5p6" },
        ]
      },

      { "row" :
        [
          { class: "element", number: 55, name: "Caesium", symbol: "Cs", type: "alkali-metals", weight: 132.90546, electrons: "[Xe] 6s1" },
          { class: "element", number: 56, name: "Barium", symbol: "Ba", type: "alkali-earth-metals", weight: 137.327, electrons: "[Xe] 6s2" },
          { class: "lanthanide-placeholder", symbol: "+" },
          { class: "element", number: 72, name: "Hafnium", type: "transition-metals", symbol: "Hf", weight: 178.49, electrons: "[Xe] 4f14 5d2 6s2" },
          { class: "element", number: 73, name: "Tantalum", type: "transition-metals", symbol: "Ta", weight: 180.94788, electrons: "[Xe] 4f14 5d3 6s2" },
          { class: "element", number: 74, name: "Tungsten", type: "transition-metals", symbol: "W", weight: 183.84, electrons: "[Xe] 4f14 5d4 6s2" },
          { class: "element", number: 75, name: "Rhenium", type: "transition-metals", symbol: "Re", weight: 186.207, electrons: "[Xe] 4f14 5d5 6s2" },
          { class: "element", number: 76, name: "Osmium", type: "transition-metals", symbol: "Os", weight: 190.23, electrons: "[Xe] 4f14 5d6 6s2" },
          { class: "element", number: 77, name: "Iridium", type: "transition-metals", symbol: "Ir", weight: 192.217, electrons: "[Xe] 4f14 5d7 6s2" },
          { class: "element", number: 78, name: "Platinum", type: "transition-metals", symbol: "Pt", weight: 195.084, electrons: "[Xe] 4f14 5d9 6s1" },
          { class: "element", number: 79, name: "Gold", type: "transition-metals", symbol: "Au", weight: 196.96657, electrons: "[Xe] 4f14 5d10 6s1" },
          { class: "element", number: 80, name: "Mercury", type: "transition-metals", symbol: "Hg", weight: 200.59, electrons: "[Xe] 4f14 5d10 6s2" },
          { class: "element", number: 81, name: "Thallium", symbol: "Tl", type: "other-metals", weight: 204.3833, electrons: "[Xe] 4f14 5d10 6s2 6p1" },
          { class: "element", number: 82, name: "Lead", symbol: "Pb", type: "other-metals", weight: 207.2, electrons: "[Xe] 4f14 5d10 6s2 6p2" },
          { class: "element", number: 83, name: "Bismuth", symbol: "Bi", type: "other-metals", weight: 208.9804, electrons: "[Xe] 4f14 5d10 6s2 6p3" },
          { class: "element", number: 84, name: "Polonium", symbol: "Po", type: "other-metals", weight: 209, electrons: "[Xe] 4f14 5d10 6s2 6p4" },
          { class: "element", number: 85, name: "Astatine", symbol: "At", type: "halogens", weight: 210, electrons: "[Xe] 4f14 5d10 6s2 6p5" },
          { class: "element", number: 86, name: "Radon", symbol: "Rn", type: "noble-gases", weight: 222, electrons: "[Xe] 4f14 5d10 6s2 6p6" },
        ]
      },

      { "row" :
        [
          { class: "element", number: 87, name: "Francium", symbol: "Fr", type: "alkali-metals", weight: 223, electrons: "[Rn] 7s1" },
          { class: "element", number: 88, name: "Radium", symbol: "Ra", type: "alkali-earth-metals", weight: 226, electrons: "[Rn] 7s2" },
          { class: "actinide-placeholder", symbol: "*" },
          { class: "element", number: 104, name: "Rutherfordium", symbol: "Rf", type: "transition-metals", weight: 267, electrons: "" },
          { class: "element", number: 105, name: "Dubnium", symbol: "Db", type: "transition-metals", weight: 268, electrons: "" },
          { class: "element", number: 106, name: "Seaborgium", symbol: "Sg", type: "transition-metals", weight: 271, electrons: "" },
          { class: "element", number: 107, name: "Bohrium", symbol: "Bh", type: "transition-metals", weight: 272, electrons: "" },
          { class: "element", number: 108, name: "Hassium", symbol: "Hs", type: "transition-metals", weight: 270, electrons: "" },
          { class: "element", number: 109, name: "Meitnerium", symbol: "Mt", type: "transition-metals", weight: 276, electrons: "" },
          { class: "element", number: 110, name: "Darmstadtium", symbol: "Ds", type: "transition-metals", weight: 281, electrons: "" },
          { class: "element", number: 111, name: "Roentgenium", symbol: "Rg", type: "transition-metals", weight: 280, electrons: "" },
          { class: "element", number: 112, name: "Copernicium", symbol: "Cn", type: "transition-metals", weight: 285, electrons: "" },
          { class: "element", number: 113, name: "Ununtrium", symbol: "Uut", type: "other-metals", weight: 284, electrons: "" },
          { class: "element", number: 114, name: "Flerovium", symbol: "Fl", type: "other-metals", weight: 289, electrons: "" },
          { class: "element", number: 115, name: "Ununpentium", symbol: "Uup", type: "other-metals", weight: 288, electrons: "" },
          { class: "element", number: 116, name: "Livermorium", symbol: "Lv", type: "other-metals", weight: 293, electrons: "" },
          { class: "element", number: 117, name: "Ununseptium", symbol: "Uus", type: "halogens", weight: 294, electrons: "" },
          { class: "element", number: 118, name: "Ununoctium", symbol: "Uuo", type: "noble-gases", weight: 294, electrons: "" }
        ]
      },

      { "lanthanides" :
        [
          { class: "blank-element", subclass: "lanthanides" },
          { class: "blank-element", subclass: "lanthanides" },
          { class: "lanthanide-placeholder", subclass: "lanthanides", symbol: "+" },
          { class: "element", subclass: "lanthanides", number: 57, name: "Lanthanum", symbol: "La", type: "transition-metals", weight: 138.90547, electrons: "[Xe] 5d1 6s2" },
          { class: "element", subclass: "lanthanides", number: 58, name: "Cerium", symbol: "Ce", type: "rare-earth-metals", weight: 140.116, electrons: "[Xe] 4f1 5d1 6s2" },
          { class: "element", subclass: "lanthanides", number: 59, name: "Praseodymium", symbol: "Pr", type: "rare-earth-metals", weight: 140.90765, electrons: "[Xe] 4f3 6s2" },
          { class: "element", subclass: "lanthanides", number: 60, name: "Neodymium", symbol: "Nd", type: "rare-earth-metals", weight: 144.242, electrons: "[Xe] 4f4 6s2" },
          { class: "element", subclass: "lanthanides", number: 61, name: "Promethium", symbol: "Pm", type: "rare-earth-metals", weight: 145, electrons: "[Xe] 4f5 6s2" },
          { class: "element", subclass: "lanthanides", number: 62, name: "Samarium", symbol: "Sm", type: "rare-earth-metals", weight: 150.36, electrons: "[Xe] 4f6 6s2" },
          { class: "element", subclass: "lanthanides", number: 63, name: "Europium", symbol: "Eu", type: "rare-earth-metals", weight: 151.964, electrons: "[Xe] 4f7 6s2" },
          { class: "element", subclass: "lanthanides", number: 64, name: "Gadolinium", symbol: "Gd", type: "rare-earth-metals", weight: 157.25, electrons: "[Xe] 4f7 5d1 6s2" },
          { class: "element", subclass: "lanthanides", number: 65, name: "Terbium", symbol: "Tb", type: "rare-earth-metals", weight: 158.92535, electrons: "[Xe] 4f9 6s2" },
          { class: "element", subclass: "lanthanides", number: 66, name: "Dysprosium", symbol: "Dy", type: "rare-earth-metals", weight: 162.5, electrons: "[Xe] 4f10 6s2" },
          { class: "element", subclass: "lanthanides", number: 67, name: "Holmium", symbol: "Ho", type: "rare-earth-metals", weight: 164.93031, electrons: "[Xe] 4f11 6s2" },
          { class: "element", subclass: "lanthanides", number: 68, name: "Erbium", symbol: "Er", type: "rare-earth-metals", weight: 167.259, electrons: "[Xe] 4f12 6s2" },
          { class: "element", subclass: "lanthanides", number: 69, name: "Thulium", symbol: "Tm", type: "rare-earth-metals", weight: 168.9342, electrons: "[Xe] 4f13 6s2" },
          { class: "element", subclass: "lanthanides", number: 70, name: "Ytterbium", symbol: "Yb", type: "rare-earth-metals", weight: 173.054, electrons: "[Xe] 4f14 6s2" },
          { class: "element", subclass: "lanthanides", number: 71, name: "Lutetium", symbol: "Lu", type: "rare-earth-metals", weight: 174.9668, electrons: "[Xe] 4f14 5d1 6s2" },
        ]
      },

      { "actinides" :
        [
          { class: "blank-element" },
          { class: "blank-element" },
          { class: "actinide-placeholder", symbol: "*" },
          { class: "element", subclass: "actinides", number: 89, name: "Actinium", symbol: "Ac", type: "transition-metals", weight: 227, electrons: "[Rn] 6d1 7s2" },
          { class: "element", subclass: "actinides", number: 90, name: "Thorium", symbol: "Th", type: "rare-earth-metals", weight: 232.03806, electrons: "[Rn] 6d2 7s2" },
          { class: "element", subclass: "actinides", number: 91, name: "Protactinium", symbol: "Pa", type: "rare-earth-metals", weight: 231.03587, electrons: "[Rn] 5f2 6d1 7s2" },
          { class: "element", subclass: "actinides", number: 92, name: "Uranium", symbol: "U", type: "rare-earth-metals", weight: 238.02892, electrons: "[Rn] 5f3 6d1 7s2" },
          { class: "element", subclass: "actinides", number: 93, name: "Neptunium", symbol: "Np", type: "rare-earth-metals", weight: 237, electrons: "[Rn] 5f4 6d1 7s2" },
          { class: "element", subclass: "actinides", number: 94, name: "Plutonium", symbol: "Pu", type: "rare-earth-metals", weight: 244, electrons: "[Rn] 5f6 7s2" },
          { class: "element", subclass: "actinides", number: 95, name: "Americium", symbol: "Am", type: "rare-earth-metals", weight: 243, electrons: "[Rn] 5f7 7s2" },
          { class: "element", subclass: "actinides", number: 96, name: "Curium", symbol: "Cm", type: "rare-earth-metals", weight: 247, electrons: "" },
          { class: "element", subclass: "actinides", number: 97, name: "Berkelium", symbol: "Bk", type: "rare-earth-metals", weight: 247, electrons: "" },
          { class: "element", subclass: "actinides", number: 98, name: "Californium", symbol: "Cf", type: "rare-earth-metals", weight: 251, electrons: "" },
          { class: "element", subclass: "actinides", number: 99, name: "Einsteinium", symbol: "Es", type: "rare-earth-metals", weight: 252, electrons: "" },
          { class: "element", subclass: "actinides", number: 100, name: "Fermium", symbol: "Fm", type: "rare-earth-metals", weight: 257, electrons: "" },
          { class: "element", subclass: "actinides", number: 101, name: "Mendelevium", symbol: "Md", type: "rare-earth-metals", weight: 258, electrons: "" },
          { class: "element", subclass: "actinides", number: 102, name: "Nobelium", symbol: "No", type: "rare-earth-metals", weight: 259, electrons: "" },
          { class: "element", subclass: "actinides", number: 103, name: "Lawrencium", symbol: "Lr", type: "rare-earth-metals", weight: 262, electrons: "" },
        ]}
    ];

  // Search progressively by first letter
  $scope.startsWith = function(actual, expected) {
    var lowerStr = (actual + "").toLowerCase();
    return lowerStr.indexOf(expected.toLowerCase()) === 0;
  };

});
