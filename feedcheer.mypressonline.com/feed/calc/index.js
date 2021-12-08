window.onload = () => {
    document.querySelector("#resultsContainer").style.width = window.getComputedStyle(document.querySelector("#inputsContainer")).getPropertyValue("width");
    document.querySelector("#infoContainer").style.width = window.getComputedStyle(document.querySelector("#inputsContainer")).getPropertyValue("width");  
};

const KILOGRAMS_PER_POUND = 0.4536;
const CENTIMETERS_PER_INCH = 2.54;
const CM2_PER_M2 = 10000;

const MIN_CAL_FEMALE = 1200;
const MIN_CAL_MALE = 1500;

const MALE_CAL_MODIFIER = 5;
const FEMALE_CAL_MODIFIER = -161;


function validateFormInputs(inputs) {
    inputs.age = parseInt(document.querySelector("#age").value);
    inputs.weight = parseInt(document.querySelector("#weight").value);
    inputs.height = parseInt(document.querySelector("#height").value);

    inputs.bodyFatPercent = parseInt(document.querySelector("#bodyFatPercent").value);
    inputs.bodyFatEntered = false;

    if (!isNaN(inputs.bodyFatPercent)) {
        inputs.bodyFatEntered = true;

        if (isNaN(inputs.bodyFatPercent) || inputs.bodyFatPercent < 0 || inputs.bodyFatPercent > 100) {
            alert("Por favor, insira um percentual de gordura corporal válido!");
            return false;
        }
    }

    if (isNaN(inputs.age) || inputs.age === "" || inputs.age < 0) {    
        alert("Por favor, insira uma idade válida!");
        return false;
    }

    if (isNaN(inputs.weight) || inputs.weight === "" || inputs.weight < 0) {    
        alert("Por favor, insira um peso válido!");
        return false;
    }

    if (isNaN(inputs.height) || inputs.height === "" || inputs.height < 0) {    
        alert("Por favor, insira uma altura válida!");
        return false;
    }

    const gender = document.querySelector("#gender");
    const weightUnit = document.querySelector("#weightUnit");
    const heightUnit = document.querySelector("#heightUnit");
    const activityLevel = document.querySelector("#activityLevel");

    inputs.gender = gender.options[gender.selectedIndex].value;
    inputs.weightUnit = weightUnit.options[weightUnit.selectedIndex].value;
    inputs.heightUnit = heightUnit.options[heightUnit.selectedIndex].value;
    inputs.activityLevel = activityLevel.options[activityLevel.selectedIndex].value;

    return true;
}

function calculateTDEEnoBF(gender, age, weight, weightUnit, height, heightUnit, activityMultiplier) {

    const safeMinCalories = (gender === "M") ? MIN_CAL_MALE : MIN_CAL_FEMALE;
    const genderModifier = (gender === "M") ? MALE_CAL_MODIFIER : FEMALE_CAL_MODIFIER;

    if (weightUnit === "LBS") {
        weight *= KILOGRAMS_PER_POUND;
    }

    if (heightUnit === "IN") {
        height *= CENTIMETERS_PER_INCH;
    }

    const BMR = (10 * weight) + (6.25 * height) - (5.0 * age) + genderModifier;

    const TDEE = Math.max(safeMinCalories, Math.round(BMR * activityMultiplier));

    return TDEE;
}



function calculateTDEEwithBF(gender, weight, weightUnit, bodyFatPercent, activityMultiplier) {

    const safeMinCalories = (gender === "M") ? MIN_CAL_MALE : MIN_CAL_FEMALE;

    if (weightUnit === "LBS") {
        weight *= KILOGRAMS_PER_POUND;
    }

    const LBM = (100 - bodyFatPercent) * 0.01 * weight;
    const BMR = (21.6 * LBM) + 370;

    const TDEE = Math.round(BMR * activityMultiplier);

    return TDEE;
}



function calculateBMI(weight, weightUnit, height, heightUnit) {

    if (weightUnit === "LBS") {
        weight *= KILOGRAMS_PER_POUND;
    }

    if (heightUnit === "IN") {
        height *= CENTIMETERS_PER_INCH;
    }

    const BMI = ((weight / height) / height) * CM2_PER_M2;

    return BMI.toFixed(1);
}


function printOutput(TDEE, BMI, gender) {
    safeMinCalories = (gender === "M") ? MIN_CAL_MALE : MIN_CAL_FEMALE;

    BMI = parseFloat(BMI);

    if (BMI < 18.5) {
        BMI_RANGE = "abaixo do peso";
    }
    else if (BMI < 25) {
        BMI_RANGE = "saudável";
    }
    else if (BMI < 30) {
        BMI_RANGE = "excesso de peso";
    }
    else {
        BMI_RANGE = "obesidade";
    }

    let infoHTML = 
        `Seu TDEE é <strong>${Math.max(TDEE, safeMinCalories)}</strong> calorias por dia.
        <br/>
        Seu IMC é <strong>${BMI}</strong>, então (<strong>${BMI_RANGE}</strong>), mas cuidado, pois o IMC só pode ser interpretado por um profissional de saúde.`;

    let resultsHTML = 
        `Para perder 1 quilograma por semana, coma <strong>${Math.max(TDEE - 1000, safeMinCalories)}</strong> calorias por dia.<br/>
        Para perder 500 gramas por semana, coma <strong>${Math.max(TDEE - 500, safeMinCalories)}</strong> calorias por dia.<br/>
        Para manter o peso, coma <strong>${Math.max(TDEE, safeMinCalories)}</strong> calorias por dia.<br/>
        Para ganhar 500 gramas por semana, coma <strong>${Math.max(TDEE + 500, safeMinCalories)}</strong> calorias por dia.<br/>
        Para ganhar 1 quilograma semana, coma <strong>${Math.max(TDEE + 1000, safeMinCalories)}</strong> calorias por dia.`;
    
    const safeMinCaloriesRegex = new RegExp(safeMinCalories, "g");
    document.querySelector("#resultsContainer").innerHTML = resultsHTML.replace(safeMinCaloriesRegex, `<abbr title='${((gender === "M") ? "Men" : "Women")} are not advised to consume less than ${safeMinCalories} calories per day.'>${safeMinCalories}</abbr>`);
    document.querySelector("#infoContainer").innerHTML = infoHTML.replace(safeMinCaloriesRegex, `<abbr title='${((gender === "M") ? "Men" : "Women")} are not advised to consume less than ${safeMinCalories} calories per day.'>${safeMinCalories}</abbr>`);
    
    document.querySelector("#resultsContainer").style.visibility = "visible";
    document.querySelector("#infoContainer").style.visibility = "visible";
}


function formSubmit() {
    const inputs = {
        age: -1,

        weight: -1,
        weightUnit: "LBS",

        height: -1,
        heightUnit: "IN",

        bodyFatEntered: false,
        bodyFatPercent: -1,

        gender: "M",
        activityLevel: -1,
    };


    if (!validateFormInputs(inputs)) {
        return;
    }
    else {
        const TDEE = (inputs.bodyFatEntered) ? calculateTDEEwithBF(inputs.gender, inputs.weight, inputs.weightUnit, inputs.bodyFatPercent, inputs.activityLevel) : calculateTDEEnoBF(inputs.gender, inputs.age, inputs.weight, inputs.weightUnit, inputs.height, inputs.heightUnit, inputs.activityLevel);

        const BMI = calculateBMI(inputs.weight, inputs.weightUnit, inputs.height, inputs.heightUnit);
        
        printOutput(TDEE, BMI, inputs.gender);
    }
}


document.querySelector("#submitBtn").addEventListener("click", formSubmit);




