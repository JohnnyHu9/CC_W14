

function CreateTradeCard()
{
    var firstname = document.forms["cardForm"]["firstname"].value;
    var lastname = document.forms["cardForm"]["lastname"].value;
    var titletext = document.forms["cardForm"]["titleText"].value;

    var firstname_color = findSelection("firstname_color");
    var lastname_color = findSelection("lastname_color");
    var title_color = findSelection("title_color");
    
    var top = document.forms["cardForm"]["top"].value + "px";
    var left = document.forms["cardForm"]["left"].value + "px";
    var img_address = document.forms["cardForm"]["img_address"].value;

    var error = false;

    if (firstname.length == 0)
    {
        document.getElementById("firstnameMessage").innerHTML = "First Name cannot be empty!!!";
        error = true;
    }
    else {
        document.getElementById("firstnameMessage").innerHTML = "";
    }
    if (lastname.length == 0) {
        document.getElementById("lastnameMessage").innerHTML = "Last Name cannot be empty!!!"
        error = true;
    }
    else {
        document.getElementById("lastnameMessage").innerHTML = ""
    }
    if(titletext.length == 0)
    {
        document.getElementById("titleMessage").innerHTML = "Title cannot be empty!!!"
        error = true;
    } else { document.getElementById("titleMessage").innerHTML = "" }

    if (error == false)
    {
        // update trade card.
        document.getElementById("first_name").innerHTML = firstname;
        document.getElementById("last_name").innerHTML = lastname;
        document.getElementById("r1").innerHTML = titletext;

        document.getElementById("first_name").style.color =firstname_color;
        document.getElementById("last_name").style.color = lastname_color;
        document.getElementById("r1").style.color = title_color;

        //sample address
        //  http://wpmedia.sports.nationalpost.com/2013/09/russia-4.jpg
        //  http://www.radcollector.com/news/wp-content/uploads/2013/12/PC030081.jpeg
        document.getElementById("image").src = img_address;

        document.getElementById("remark").style.top = top;
        document.getElementById("remark").style.left = left;
    }

    return false;
}

function findSelection(field) {
    var radios = document.getElementsByName(field);

    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            // do whatever you want with the checked radio
            return radios[i].value;
            // only one radio can be logically checked, don't check the rest
            break;
        }
    }
}

function reDo()
{
    document.getElementById("first_name").innerHTML = "Zhixiang,Johnny";
    document.getElementById("last_name").innerHTML = "Hu";
    document.getElementById("r1").innerHTML = "Senior Developer";

    document.getElementById("first_name").style.color = "Black";
    document.getElementById("last_name").style.color = "Red";
    document.getElementById("r1").style.color = "Black";

    document.getElementById("image").src = "images/image.jpg";
    document.getElementById("remark").style.top = 320;
    document.getElementById("remark").style.left = 222;

    document.getElementById("cardForm").reset();

    document.getElementById("firstnameMessage").innerHTML = "";
    document.getElementById("lastnameMessage").innerHTML = "";
    document.getElementById("titleMessage").innerHTML = "";
    return false;
}

