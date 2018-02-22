$(document).ready(function() {

    $("#add-address").click(function() {
        $("#new-addresses").append('<div class="new-address">' +
                                        '<div class="form-group">' +
                                        '<label for="new-street">Street</label>' +
                                            '<input type="text" class="form-control" id="new-street" required />' +
                                            '</div>' +
                                        '<div class="row">' +
                                          '<div class="col-md-8">' +
                                            '<div class="form-group">' +
                                              '<label for="new-city">City</label>' +
                                              '<input type="text" class="form-control" id="new-city" required />' +
                                            '</div>' +
                                          '</div>' +
                                          '<div class="col-md-4">' +
                                            '<div class="form-group">' +
                                              '<label for="new-state">State</label>' +
                                              '<input type="text" class="form-control" id="new-state" required />' +
                                            '</div>' +
                                          '</div>' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label for="new-zip">Zip</label>' +
                                          '<input type="text" class="form-control" id="new-zip" required />' +
                                          '</div>' +
                                    '</div>');
    });

    // When user clicks on 'Add' button, everything in here runs...
    $("form#new-contact").submit(function(event) {

        // Attributes - get value from input fields in the form and store them in variables
        var inputtedFirstName = $("input#new-first-name").val();
        var inputtedLastName  = $("input#new-last-name").val();
        var inputtedPhone     = $("input#new-phone").val();
        var inputtedEmail     = $("input#new-email").val();

        // Define a 'Contact' Object
        var newContact = {
                    firstName:   inputtedFirstName,
                    lastName:    inputtedLastName,
                    addresses:   [],
                    phone:       inputtedPhone,
                    email:       inputtedEmail
                };

        $(".new-address").each(function() {
            var inputtedStreet    = $(this).find("input#new-street").val();
            var inputtedCity      = $(this).find("input#new-city").val();
            var inputtedState     = $(this).find("input#new-state").val();
            var inputtedZip       = $(this).find("input#new-zip").val();


            var newAddress = {
                    street:      inputtedStreet,
                    city:        inputtedCity,
                    state:       inputtedState,
                    zip:         inputtedZip,
                };

            newContact.addresses.push(newAddress);

        });

        // Populates the list of clickable names
        $("ul#contacts").append("<li><span class='contact'>" + newContact.firstName + " " + newContact.lastName + "</span></li>");

        // When user clicks on name, this reveals the properties of that
        $(".contact").last().click(function() {
            $("#show-contact").show();

            $("#show-contact h2").text(newContact.firstName + " " + newContact.lastName);
            $(".first-name").text(newContact.firstName);
            $(".last-name").text(newContact.lastName);

            $("ul#addresses").text("");
            newContact.addresses.forEach(function(address) {
                $("ul#addresses").append("<li>" + address.street + ", " + address.city + ", " + address.state + ", " + address.zip + "</li>");
            });

            $(".phone").text(newContact.phone);
            $(".email").text(newContact.email);
        });

        // Resets the inputs to be blank
        $("input#new-first-name").val("");
        $("input#new-last-name").val("");
        $("input#new-street").val("");
        $("input#new-city").val("");
        $("input#new-state").val("");
        $("input#new-zip").val("");
        $("input#new-phone").val("");
        $("input#new-email").val("");

        event.preventDefault();

    });

});
