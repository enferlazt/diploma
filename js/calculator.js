function calculator() {
    var P = parseInt(document.getElementById('pass').value);
    var F = parseInt(document.getElementById('fuel').value);
    var x = document.getElementById("airplane").selectedIndex;
    if(document.getElementsByTagName("option")[x].value == "0")
    {
        alert("Выберите самолет");
    }
    else{
        if(document.getElementsByTagName("option")[x].value == "1")
        {
            var C = 1.3;
            var V = 905;
            var M1 = 142000 + F + (P*100+1400);
            var M2 = 142000 + (P*100+1400);
            var K = 18;
            
            if(P < "0" || P > "305" || F < "8000" || F > "120000"){
                alert ("Данные введены неверно!");
                return;
            }
        }
        if(document.getElementsByTagName("option")[x].value == "2")
        {
            var C = 1.7;
            var V = 840;
            var M1 = 42000 + F + (P*100+600);
            var M2 = 42000 + (P*100+600);
            var K = 15;
            
            if(P < "0" || P > "150" || F < "2000" || F > "20000"){
                alert ("Данные введены неверно!");
                return;
            }
        }
        if(document.getElementsByTagName("option")[x].value == "3")
        {
            var C = 1.8;
            var V = 820;
            var M1 = 59000 + F + (P*100+700);
            var M2 = 59000 + (P*100+700);
            var K = 16;
            
            if(P < "0" || P > "170" || F < "2500" || F > "30000"){
                alert ("Данные введены неверно!");
                return;
            }
        }
        if(document.getElementsByTagName("option")[x].value == "4")
        {
            var C = 1.6;
            var V = 820;
            var M1 = 24000 + F + (P*100+400);
            var M2 = 24000 + (P*100+400);
            var K = 10;
            
            if(P < "0" || P > "75" || F < "1500" || F > "10000"){
                alert ("Данные введены неверно!");
                return;
            }
        }
        if(isNaN(P)==false && isNaN(F)==false)
        {
            var L = K * V / C * Math.log1p(M1/M2);
            document.getElementById('result').innerHTML = "Самолет способен преодолеть до " + L.toFixed(2) + " километров.";
        }
        if(isNaN(P) || isNaN(F))
        {
            alert("Введите данные!");
        }
    }
}

function calculator_en() {
    var P = parseInt(document.getElementById('pass').value);
    var F = parseInt(document.getElementById('fuel').value);
    var x = document.getElementById("airplane").selectedIndex;
    if(document.getElementsByTagName("option")[x].value == "0")
    {
        alert("Select plane!");
    }
    else{
        if(document.getElementsByTagName("option")[x].value == "1")
        {
            var C = 1.3;
            var V = 905;
            var M1 = 142000 + F + (P*100+1400);
            var M2 = 142000 + (P*100+1400);
            var K = 18;
            
            if(P < "0" || P > "305" || F < "8000" || F > "120000"){
                alert ("The data is entered incorrectly!");
                return;
            }
        }
        if(document.getElementsByTagName("option")[x].value == "2")
        {
            var C = 1.7;
            var V = 840;
            var M1 = 42000 + F + (P*100+600);
            var M2 = 42000 + (P*100+600);
            var K = 15;
            
            if(P < "0" || P > "150" || F < "2000" || F > "20000"){
                alert ("The data is entered incorrectly!");
                return;
            }
        }
        if(document.getElementsByTagName("option")[x].value == "3")
        {
            var C = 1.8;
            var V = 820;
            var M1 = 59000 + F + (P*100+700);
            var M2 = 59000 + (P*100+700);
            var K = 16;
            
            if(P < "0" || P > "170" || F < "2500" || F > "30000"){
                alert ("The data is entered incorrectly!");
                return;
            }
        }
        if(document.getElementsByTagName("option")[x].value == "4")
        {
            var C = 1.6;
            var V = 820;
            var M1 = 24000 + F + (P*100+400);
            var M2 = 24000 + (P*100+400);
            var K = 10;
            
            if(P < "0" || P > "75" || F < "1500" || F > "10000"){
                alert ("The data is entered incorrectly!");
                return;
            }
        }
        if(isNaN(P)==false && isNaN(F)==false)
        {
            var L = K * V / C * Math.log1p(M1/M2);
            document.getElementById('result').innerHTML = "The aircraft is able to overcome" + L.toFixed(2) + " kilometers.";
        }
        if(isNaN(P) || isNaN(F))
        {
            alert("Enter the data!");
        }
    }
}

function help() {
    var x = document.getElementById("airplane").selectedIndex;
    if(document.getElementsByTagName("option")[x].value == "0")
    {
        alert("Выберите самолет");
    }
    if(document.getElementsByTagName("option")[x].value == "1")
    {
        alert("Самолет может перевозить от 0 до 305 пассажиров и от 8000 до 120000 кг топлива");
    }
    if(document.getElementsByTagName("option")[x].value == "2")
    {
        alert("Самолет может перевозить от 0 до 150 пассажиров и от 2000 до 20000 кг топлива");
    }
    if(document.getElementsByTagName("option")[x].value == "3")
    {
        alert("Самолет может перевозить от 0 до 170 пассажиров и от 2500 до 30000 кг топлива");
    }
    if(document.getElementsByTagName("option")[x].value == "4")
    {
        alert("Самолет может перевозить от 0 до 75 пассажиров и от 1500 до 10000 кг топлива");
    }
}

function help_en() {
    var x = document.getElementById("airplane").selectedIndex;
    if(document.getElementsByTagName("option")[x].value == "0")
    {
        alert("Select plane!");
    }
    if(document.getElementsByTagName("option")[x].value == "1")
    {
        alert("The aircraft can carry from 0 to 305 passengers and from 8000 to 120000 kg of fuel");
    }
    if(document.getElementsByTagName("option")[x].value == "2")
    {
        alert("The aircraft can carry from 0 to 150 passengers and from 2000 to 20000 kg of fuel");
    }
    if(document.getElementsByTagName("option")[x].value == "3")
    {
        alert("The aircraft can carry from 0 to 170 passengers and from 2500 to 30000 kg of fuel");
    }
    if(document.getElementsByTagName("option")[x].value == "4")
    {
        alert("The aircraft can carry from 0 to 75 passengers and from 1500 to 10000 kg of fuel");
    }
}   