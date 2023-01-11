function calculate_bmi() {
    //Need to determine the constant of some id functions.

    var bmiID = document.getElementById("bmi");
    //The value of the height slider
    var height = (document.getElementById("Height").value);
    //The value of the weight slider
    var weight = (document.getElementById("Weight").value);

    //The value of height and width should be displayed in the webpage using "textContent".
    //document.getElementById("Weight").textContent = weight + " kg";
    //document.getElementById("Height").textContent = height + " cm";

    //Now I have added the formula for calculating BMI in "bmi"
    var bmivalue = (weight / (height * height));
    bmiID.value = bmivalue;

    //With the help of "textContent" we have arranged to display in the result page of BMI



    //Now we have to make arrangements to show the text


    //When the BMI is less than 18.5, you can see the text below
    if (bmivalue < 18.5) {
        // alert("Under weight");   
        document.getElementById("bmi").innerText = "Under weight";
    }

    //If BMI is >=18.5 and <=24.9
    else if (bmivalue >= 18.5 && bmivalue <= 24.9) {
        // alert("Normal Weight");
        document.getElementById("bmi").innerText = "Nornal weight";
    }

    //If BMI is >= 25 and <= 29.9 
    else if (bmivalue >= 25 && bmivalue <= 29.9) {
        // alert("Over Weight");
        document.getElementById("bmi").innerText = "Over weight";
    }

    //If BMI is <= 30
    else {
        // alert("Obese");
        document.getElementById("bmi").innerText = "Obese";
    }
    //All of the above text is stored in "category".

    //Now you have to make arrangements to display the information in the webpage with the help of "textContent"

}