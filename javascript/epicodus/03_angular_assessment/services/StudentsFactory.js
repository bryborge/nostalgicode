StudentSignin.factory("StudentsFactory", function StudentsFactory() {
  var factory = {};
  factory.students = [
    { name: "Bryan Borgeson", status: false },
    { name: "Geoff Bensen", status: false },
    { name: "Laura Scrupp", status: false },
    { name: "Zak Trasher", status: false },
    { name: "Jessica Spater", status: false },
    { name: "Brandon Tanner", status: false }
  ];

  factory.signIn = function(student) {
    student.status = true;
  };

  factory.signOut = function(student) {
    student.status = false;
  };

  factory.addStudent = function(student) {
    factory.students.push({ name: student, status: false });
  };

  return factory;

});
