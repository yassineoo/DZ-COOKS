





function controlFromInput(fromSlider, fromInput, toInput, controlSlider) {
    const [from, to] = getParsed(fromInput, toInput);
    fillSlider(fromInput, toInput, '#C6C6C6', '#25daa5', controlSlider);
    if (from > to) {
        fromSlider.value = to;
        fromInput.value = to;
    } else {
        fromSlider.value = from;
    }
}
    
function controlToInput(toSlider, fromInput, toInput, controlSlider) {
    const [from, to] = getParsed(fromInput, toInput);
    fillSlider(fromInput, toInput, '#C6C6C6', '#25daa5', controlSlider);
    setToggleAccessible(toInput);
    if (from <= to) {
        toSlider.value = to;
        toInput.value = to;
    } else {
        toInput.value = from;
    }
}

function controlFromSlider(fromSlider, toSlider, fromInput) {
  const [from, to] = getParsed(fromSlider, toSlider);
  fillSlider(fromSlider, toSlider, '#C6C6C6', '#25daa5', toSlider);
  if (from > to) {
    fromSlider.value = to;
    fromInput.value = to;
  } else {
    fromInput.value = from;
  }
}

function controlToSlider(fromSlider, toSlider, toInput) {
  const [from, to] = getParsed(fromSlider, toSlider);
  fillSlider(fromSlider, toSlider, '#C6C6C6', '#25daa5', toSlider);
  setToggleAccessible(toSlider);
  if (from <= to) {
    toSlider.value = to;
    toInput.value = to;
  } else {
    toInput.value = from;
    toSlider.value = from;
  }
}

function getParsed(currentFrom, currentTo) {
  const from = parseInt(currentFrom.value, 10);
  const to = parseInt(currentTo.value, 10);
  return [from, to];
}

function fillSlider(from, to, sliderColor, rangeColor, controlSlider) {
    const rangeDistance = to.max-to.min;
    const fromPosition = from.value - to.min;
    const toPosition = to.value - to.min;
    controlSlider.style.background = `linear-gradient(
      to right,
      ${sliderColor} 0%,
      ${sliderColor} ${(fromPosition)/(rangeDistance)*100}%,
      ${rangeColor} ${((fromPosition)/(rangeDistance))*100}%,
      ${rangeColor} ${(toPosition)/(rangeDistance)*100}%, 
      ${sliderColor} ${(toPosition)/(rangeDistance)*100}%, 
      ${sliderColor} 100%)`;
}

function setToggleAccessible(currentTarget) {
  const toSlider = document.querySelector('#toSlider');
  if (Number(currentTarget.value) <= 0 ) {
    toSlider.style.zIndex = 2;
  } else {
    toSlider.style.zIndex = 0;
  }
}

const fromSlider = document.querySelector('#fromSlider');
const toSlider = document.querySelector('#toSlider');
const fromInput = document.querySelector('#fromInput');
const toInput = document.querySelector('#toInput');
fillSlider(fromSlider, toSlider, '#C6C6C6', '#25daa5', toSlider);
setToggleAccessible(toSlider);

fromSlider.oninput = () => controlFromSlider(fromSlider, toSlider, fromInput);
toSlider.oninput = () => controlToSlider(fromSlider, toSlider, toInput);
fromInput.oninput = () => controlFromInput(fromSlider, fromInput, toInput, toSlider);
toInput.oninput = () => controlToInput(toSlider, fromInput, toInput, toSlider);


const fromSlidercuisson = document.querySelector('#fromSlidercuisson');
const toSliderCuisson = document.querySelector('#toSliderCuisson');
const fromInputCuisson = document.querySelector('#fromInputCuisson');
const toInputCuisson = document.querySelector('#toInputCuisson');
fillSlider(fromSlidercuisson, toSliderCuisson, '#C6C6C6', '#25daa5', toSliderCuisson);
setToggleAccessible(toSliderCuisson);

fromSlidercuisson.oninput = () => controlFromSlider(fromSlidercuisson, toSliderCuisson, fromInputCuisson);
toSliderCuisson.oninput = () => controlToSlider(fromSlidercuisson, toSliderCuisson, toInputCuisson);
fromInputCuisson.oninput = () => controlFromInput(fromSlidercuisson, fromInputCuisson, toInputCuisson, toSliderCuisson);
toInputCuisson.oninput = () => controlToInput(toSliderCuisson, fromInputCuisson, toInputCuisson, toSliderCuisson);




const fromSliderTotale = document.querySelector('#fromSliderTotale');
const toSliderTotale = document.querySelector('#toSliderTotale');
const fromInputTotale = document.querySelector('#fromInputTotale');
const toInputTotale = document.querySelector('#toInputTotale');
fillSlider(fromSliderTotale, toSliderTotale, '#C6C6C6', '#25daa5', toSliderTotale);
setToggleAccessible(toSliderTotale);

fromSliderTotale.oninput = () => controlFromSlider(fromSliderTotale, toSliderTotale, fromInputTotale);
toSliderTotale.oninput = () => controlToSlider(fromSliderTotale, toSliderTotale, toInputTotale);
fromInputTotale.oninput = () => controlFromInput(fromSliderTotale, fromInputTotale, toInputTotale, toSliderTotale);
toInputTotale.oninput = () => controlToInput(toSliderTotale, fromInputTotale, toInputTotale, toSliderTotale);





const fromSliderStar = document.querySelector('#fromSliderStar');
const toSliderStar = document.querySelector('#toSliderStar');
const fromInputStar = document.querySelector('#fromInputStar');
const toInputStar = document.querySelector('#toInputStar');
fillSlider(fromSliderStar, toSliderStar, '#C6C6C6', '#25daa5', toSliderStar);
setToggleAccessible(toSliderStar);

fromSliderStar.oninput = () => controlFromSlider(fromSliderStar, toSliderStar, fromInputStar);
toSliderStar.oninput = () => controlToSlider(fromSliderStar, toSliderStar, toInputStar);
fromInputStar.oninput = () => controlFromInput(fromSliderStar, fromInputStar, toInputStar, toSliderStar);
toInputStar.oninput = () => controlToInput(toSliderStar, fromInputStar, toInputStar, toSliderStar);


const fromSliderCalories = document.querySelector('#fromSliderCalories');
const toSliderCalories = document.querySelector('#toSliderCalories');
const fromInputCalories = document.querySelector('#fromInputCalories');
const toInputCalories = document.querySelector('#toInputCalories');
fillSlider(fromSliderCalories, toSliderCalories, '#C6C6C6', '#25daa5', toSliderCalories);
setToggleAccessible(toSliderCalories);

fromSliderCalories.oninput = () => controlFromSlider(fromSliderCalories, toSliderCalories, fromInputCalories);
toSliderCalories.oninput = () => controlToSlider(fromSliderCalories, toSliderCalories, toInputCalories);
fromInputCalories.oninput = () => controlFromInput(fromSliderCalories, fromInputCalories, toInputCalories, toSliderCalories);
toInputCalories.oninput = () => controlToInput(toSliderCalories, fromInputCalories, toInputCalories, toSliderCalories);
